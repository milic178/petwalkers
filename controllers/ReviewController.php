<?php

namespace app\controllers;

use app\models\Reviews;

class ReviewController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    /** Action for rendering form where we submit review code
     * @return string
     */
    public function actionEnterCode()
    {
        $model = new Reviews();
        return $this->renderAjax('enterCode',[
            'model' => $model,
        ]);
    }

    public function checkCode(){

    }



}
