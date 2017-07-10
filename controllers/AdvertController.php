<?php

namespace app\controllers;

use Yii;
use app\models\Advert;
use app\models\AdvertSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use app\components\AccessRule;
use yii\filters\AccessControl;
use app\models\Profile;
use yii\data\ActiveDataProvider;

/**
 * AdvertController implements the CRUD actions for Advert model.
 */
class AdvertController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['index','create', 'update', 'delete','view','listAdverts','myadds'],
                'rules' => [
                    [
                        'actions' => ['view','listAdverts'],
                        'allow' => true,
                        'roles' => ['?','@'],
                    ],
                    [
                        'actions' => ['create','myadds','update', 'delete'],
                        'allow' => true,
                        'roles' => ['@','admin'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
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

    /**
     * Lists all Advert models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdvertSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advert model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

    $model = $this->findModel($id);
    $profile = Profile::findOne($model->id_user);

        return $this->render('view', [
            'model'  => $model,
            'profile' => $profile,
        ]);


    }


    /**
     * Creates a new Advert model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Advert();

        if ($model->load(Yii::$app->request->post())) {

            $model->id_user = Yii::$app->user->id;

            if ( $model->duplicateAdvert($model->id_type,$model->id_city,$model->id_animal,$model->id_user)):

                \Yii::$app->getSession()->setFlash('danger',[
                    'type' => 'danger',
                    'duration' => 4500,
                    'icon' => 'glyphicon glyphicon-remove-sign',
                    'message' => Yii::t('kvdialog','You have already posted advert with this specifics'),
                    'title' => Yii::t('kvdialog','Advert not created'),
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
                return $this->actionIndex();
            else:

                if( $model->save()):
                $this->setValidDate($model->id_advert);
                endif;

                \Yii::$app->getSession()->setFlash('success',[
                    'type' => 'success',
                    'duration' => 4500,
                    'icon' => 'glyphicon glyphicon-ok-sign',
                    'message' => Yii::t('kvdialog','You have succesfuly posted advertisment!'),
                    'title' => Yii::t('kvdialog','Add created'),
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);

                return $this->redirect(['view', 'id' => $model->id_advert]);
            endif;
        }

        else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing Advert model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) :

            if(!Yii::$app->user->identity->isAdmin):

                if($model->id_user != Yii::$app->user->id ):
                    throw new ForbiddenHttpException(Yii::t('kvdialog','You are not the owner!'));
                else:

                    $model->save();

                    \Yii::$app->getSession()->setFlash('success',[
                        'type' => 'success',
                        'duration' => 4500,
                        'icon' => 'glyphicon glyphicon-ok-sign',
                        'message' => Yii::t('kvdialog','You have successfully updated advertisement!'),
                        'title' => Yii::t('kvdialog','Operation successful!'),
                        'positonY' => 'top',
                        'positonX' => 'right'
                    ]);

                    return $this->redirect(['view', 'id' => $model->id_advert]);
                endif;

            else:

                $model->save();
                return $this->redirect(['view', 'id' => $model->id_advert]);
            endif;
        endif;

        if(Yii::$app->user->identity->isAdmin || $model->id_user == Yii::$app->user->id ):
            return $this->render('update', [
                'model' => $model,
            ]);
        else:
            throw new ForbiddenHttpException(Yii::t('kvdialog','You are not the owner!'));
        endif;

    }

    /**
     * Deletes an existing Advert model.
     * Delete works only if add is your or if adming requests action
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
    $model = $this ->findModel($id);

        if(!Yii::$app->user->identity->isAdmin):
            if ( $model->id_user!= Yii::$app->user->id ):
                throw new ForbiddenHttpException(Yii::t('kvdialog','You are not the owner!'));
            else:
                $model->delete();

                \Yii::$app->getSession()->setFlash('success',[
                    'type' => 'success',
                    'duration' => 4500,
                    'icon' => 'glyphicon glyphicon-ok-sign',
                    'message' => Yii::t('kvdialog','You have successfully deleted advertisement!'),
                    'title' => Yii::t('kvdialog','Operation successful!'),
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);

                return $this->actionMyadds();
            endif;
        else:
            $model->delete();
            return $this->redirect(['index']);
        endif;
    }

    /**
     * Finds the Advert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advert the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advert::findOne($id)) ) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @param $id
     * Fuction made for setting default valid date for add  (+2 weeks) from creation
     */
    public function setValidDate($id){
        $model =  $this->findModel($id);
        $createdTime = $model->created;
        $validDate = date('Y-m-d H:i:s', strtotime('+14 days', strtotime($createdTime)));

        $model->valid_until = $validDate;
        $model->save();

    }

    /** Returns a list of user owned adds
     * @return string
     */
    public function actionMyadds(){
        $dataProvider = new ActiveDataProvider([
            'query' => Advert::find()->where(['id_user' => \Yii::$app->user->identity->getId()])
        ]);
$countDates = Advert::adddsToExpire();
        return $this->render('myAdverts', [
            'dataProvider' => $dataProvider,
            'countDates'=>$countDates
        ]);
    }

    /** fucntion for listing adverts based on query parameters given by landing page!
     * @return string
     */

    public function actionListAdverts(){

        $searchModel = new AdvertSearch();
        if (Yii::$app->request->get()):

            $searchModel->id_type = $_GET['Advert']['id_type'];
            $searchModel->id_city = $_GET['Advert']['id_city'];
            $searchModel->id_animal = $_GET['Advert']['id_animal'];
            $searchModel->max_price = $_GET['Advert']['price'];

            if ($_GET['Advert']['price'] == 10):
                $searchModel->min_price = 0 ;
            elseif($_GET['Advert']['price'] == 20):
                $searchModel->min_price = 10 ;
            elseif($_GET['Advert']['price'] == 50):
                $searchModel->min_price = 20 ;
            endif;

            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('listAdverts', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        else:
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('listAdverts', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        endif;

    }




}
