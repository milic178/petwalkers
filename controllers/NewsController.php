<?php
/**
 *  Controller for dispalying news and aricles
 */
namespace app\controllers;

class NewsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionNewsOne()
    {
        return $this->render('news1');
    }

    public function actionNewsTwo()
    {
        return $this->render('news2');
    }

    public function actionNewsThree()
    {
        return $this->render('news3');
    }

}
