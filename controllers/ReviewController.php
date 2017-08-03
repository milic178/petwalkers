<?php

namespace app\controllers;

use app\models\User;
use Yii;
use app\models\Profile;
use app\models\Reviews;
use yii\web\NotFoundHttpException;
use yii\base\UserException;
use yii\data\ActiveDataProvider;
use app\components\AccessRule;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class ReviewController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['list-reviews','review-decline', 'review-accept', 'show-reviews','save-review','request-code','enter-code'],
                'rules' => [
                    [
                        'actions' => ['enter-code','save-review'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['request-code'],
                        'allow' => true,
                        'roles' => ['?','@'],
                    ],
                    [
                        'actions' => ['list-reviews','review-decline','review-accept','show-reviews'],
                        'allow' => true,
                        'roles' => ['@','admin'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }



    /** Action for listing reviews to be accepted/declined by user
     * @return string
     */
    public function actionListReviews()
    {
        $model = Reviews::reviewsToApproved(\Yii::$app->user->identity->id);

        $dataProvider = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pagesize' => 10,
            ],
        ]);
        return $this->render('listToBeApproved',[
            'dataProvider' => $dataProvider,
        ]);
    }


    /** Functon for declining review and deleting it from database
     * @return \yii\console\Response|\yii\web\Response
     */
    public function actionReviewDecline(){

        $id = \Yii::$app->request->post('id_review');
        if ( $model = $this ->findModel($id)):
            $model->declined = 1;
                if($model->save()) :
                   $model->refresh();
                    \Yii::$app->getSession()->setFlash('danger',[
                        'type' => 'danger',
                        'duration' => 5500,
                        'icon' => 'glyphicon glyphicon-info-sign',
                        'message' => Yii::t('kvdialog','You have declined review for your profile.'),
                        'title' => Yii::t('kvdialog','Review declined!'),
                        'positonY' => 'top',
                        'positonX' => 'right'
                    ]);
                    return $this->redirect(['/review/list-reviews']);
                else:
                    throw new UserException(\Yii::t('app','Something went wrong, please contact us with more details'));
                endif;
        else:
            throw new UserException(\Yii::t('app','We couldn\'t find that review, please contact us with more details'));
        endif;
    }

    /** Functon for accepting review and deleting it from database
     * @return \yii\console\Response|\yii\web\Response
     */
    public function actionReviewAccept(){

        $id = \Yii::$app->request->post('id_review');
        if ( $model = $this ->findModel($id)):
            $model->approved = 1;

            if ($model->save()):
                \Yii::$app->getSession()->setFlash('success',[
                    'type' => 'success',
                    'duration' => 5500,
                    'icon' => 'glyphicon glyphicon-ok-sign',
                    'message' => Yii::t('kvdialog','Review will be shown on your profile.'),
                    'title' => Yii::t('kvdialog','Review accepted!'),
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
                return $this->redirect(['/review/list-reviews']);

            else:
                throw new UserException(\Yii::t('app','Soemthing went wrong, please contact us with more details'));
            endif;
        endif;
    }



    /** Action for rendering form where we submit review code and perform validation for code. If all is ok we render view to leave
     * review for user
     *
     * @return string
     */
    public function actionEnterCode()
    {
        $model = new Reviews();

        if ($model->load(\Yii::$app->request->get())):
            $code = \Yii::$app->request->get('Reviews')['review_code'];
            //validating code input
                if(!Reviews::codeExsists($code)){
                    throw new NotFoundHttpException(\Yii::t('app','Code you have entered does not exist or has been deleted!'));
                }
                if (Reviews::codeValid($code)){
                    throw new UserException(\Yii::t('app','Code you have entered is older than 2 days making it invalid!'));
                }
                if(Reviews::codeUsed($code)){
                    throw new UserException(\Yii::t('app','Code you have entered has already been used!'));
                }

            $review = Reviews::find()->where( [ 'review_code' => $code ] )->one();
            $profile = Profile::findOne($review->id_profile);

            if(!$profile){
                throw new NotFoundHttpException(\Yii::t('app','The user does not exist or yet has no profile!'));
            }

            \Yii::$app->getSession()->setFlash('success',[
                'type' => 'success',
                'duration' => 5000,
                'icon' => 'glyphicon glyphicon-ok-sign',
                'message' => \Yii::t('app','Please fill the form below to post your review about user.'),
                'title' => \Yii::t('app','Review code accepted!'),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);

            return $this->render('enterReviewForm', [
                'review' => $review,
                'profile' => $profile,
            ]);
        endif;

        return $this->renderAjax('enterCode',[
            'model' => $model,
        ]);
    }


    /** Actoin for rendering form for requesting code to post review
     * @return string
     */
    public function actionRequestCode($id_profile)
    {
        $profile = Profile::findOne($id_profile);
        $user = User::findOne($id_profile);
        $model = new Reviews();

        if ($model->load(\Yii::$app->request->post())) {

            $name = \Yii::$app->request->post('Reviews')['name'];
            $lastname = \Yii::$app->request->post('Reviews')['lastname'];
            $petname = \Yii::$app->request->post('Reviews')['petname'];

            if (Reviews::reviewerExsists($name, $lastname, $petname)){
                throw new UserException (\Yii::t('app','This user has been already reviewed by person with that name and pet!'));
            }

            if(Yii::$app->user->id == $id_profile){
            throw new UserException(\Yii::t('app','You can\'t request review code for your profile!'));
            }

                $code = \Yii::$app->getSecurity()->generateRandomString(8);
                $model->review_code = $code;
                $model->id_profile = $id_profile;

                // code is valid for 2 days after requesting
                $model->valid_until = date('Y-m-d H:i:s', strtotime('+2 days', strtotime(date('Y-m-d H:i:s'))));

                if($model->save()):
                    \Yii::$app->response->format = 'json';
                    $message = \Yii::t('app','Review code has been generated and is valid for 2 days! Please save the code if you want to review pet walker! Your code is:    ');
                    return ['message' =>$message , 'code'=>$model->review_code, 'telephone'=>$user->profile->telephone, 'email'=>$user->email] ;
                else:
                    \Yii::$app->response->format = 'json';
                    $message = \Yii::t('app','Something went wrong we couldt generate your code:    ');
                    return ['message' => $message, $model->errors ];
                endif;
        }

        return $this->renderAjax('requestCode',[
            'model' => $model,
        ]);
    }

    /**  Function for saving review wth description and rating
     * @return \yii\web\Response
     * @throws UserException
     *
     */
    public function actionSaveReview(){

        $model = Reviews::codeExsists(\Yii::$app->request->post('Reviews')['review_code']);
        $model->description = \Yii::$app->request->post('Reviews')['description'];
        $model->rating = \Yii::$app->request->post('Reviews')['rating'];
        $model->used = 1;

        if( $model->save()):
            \Yii::$app->getSession()->setFlash('success',[
                'type' => 'success',
                'duration' => 7000,
                'icon' => 'glyphicon glyphicon-ok-sign',
                'message' => \Yii::t('app',('Thank you! Review has been submitted and will be public when approved by system')),
                'title' => \Yii::t('app',('Review submitted')),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);

             $this->goHome();
        else:
            print_r('Fail');  die();
        endif;

    }

    /** Displaying user reviews for testing purposes!
     * @return string
     */
    public function actionShowReviews(){

        $id_profile = 45;

        $model = Reviews::listAllApprovedReviews($id_profile);
        return $this->render('showReviews',[
            'model' => $model
        ]);
    }


    /**
     * Finds the Advert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reviews the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reviews::findOne($id)) ) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app','The requested page does not exist.'));
        }
    }


}
