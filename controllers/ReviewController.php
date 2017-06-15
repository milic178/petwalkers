<?php

namespace app\controllers;

use app\models\Reviews;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\base\UserException;

class ReviewController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    /** Action for rendering form where we submit review code and perform validation for code. If all is ok we render view to leave
     * review for user
     * @return string
     */
    public function actionEnterCode()
    {
        $model = new Reviews();


        if ($model->load(\Yii::$app->request->post())):

            $code = \Yii::$app->request->post('Reviews')['review_code'];
                if(!Reviews::codeExsists($code)){
                    throw new NotFoundHttpException(\Yii::t('app','Code you have entered does not exist or has been deleted!'));
                }
                if (Reviews::codeValid($code)){
                    throw new UserException(\Yii::t('app','Code you have entered is older than 2 days making it invalid!'));
                }
                if(Reviews::codeUsed($code)){
                    throw new UserException(\Yii::t('app','Code you have entered has already been used!'));
                }

        endif;

        return $this->renderAjax('enterCode',[
            'model' => $model,
        ]);
    }

    public function checkCode(){

    }

    /** Actoin for rendering form for requesting code to post review
     * @return string
     */
    public function actionRequestCode($id_profile)
    {

        $model = new Reviews();

        if ($model->load(\Yii::$app->request->post())) {

            $name = \Yii::$app->request->post('Reviews')['name'];
            $lastname = \Yii::$app->request->post('Reviews')['lastname'];
            $petname = \Yii::$app->request->post('Reviews')['petname'];

            if (Reviews::reviewerExsists($name, $lastname, $petname)){
                throw new UserException (\Yii::t('app','This user has been already reviewed by person with that name and pet!'));
            }
                $code = \Yii::$app->getSecurity()->generateRandomString(8);
                $model->review_code = $code;
                $model->id_profile = $id_profile;

                // code is valid for 2 days after requesting
                $model->valid_until = date('Y-m-d H:i:s', strtotime('+2 days', strtotime(date('Y-m-d H:i:s'))));

                if($model->save()):
                    \Yii::$app->response->format = 'json';
                    $message = \Yii::t('app','Review code has been generated and is valid for 2 days! Please save the code if you want to review pet walker! Your code is -->    ');
                    return ['message' =>$message , 'code'=>$model->review_code];
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

}
