<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 24.5.2017
 * Time: 19:01
 */





/**
 * Override of RegistrationController from Yii2-user module
 */

namespace app\controllers;

use dektrium\user\controllers\RegistrationController;
use dektrium\user\models\RegistrationForm;
use yii\web\NotFoundHttpException;


class RegisterController extends RegistrationController
{

    public function actionConfirm($id, $code)
    {
        $user = $this->finder->findUserById($id);

        if ($user === null || $this->module->enableConfirmation == false) {
            throw new NotFoundHttpException();
        }

        $event = $this->getUserEvent($user);

        $this->trigger(self::EVENT_BEFORE_CONFIRM, $event);

        $user->attemptConfirmation($code);

        $this->trigger(self::EVENT_AFTER_CONFIRM, $event);

        return $this->redirect(array('/user/settings/profile'));

    }

    public function actionRegister()
    {
        if (!$this->module->enableRegistration) {
            throw new NotFoundHttpException();
        }

        /** @var RegistrationForm $model */
        $model = \Yii::createObject(RegistrationForm::className());
        $event = $this->getFormEvent($model);

        $this->trigger(self::EVENT_BEFORE_REGISTER, $event);

        $this->performAjaxValidation($model);

        if ($model->load(\Yii::$app->request->post()) && $model->register()) {
            $this->trigger(self::EVENT_AFTER_REGISTER, $event);

            return $this->redirect('/user/security/login');
        }
        return $this->render('register', [
            'model'  => $model,
            'module' => $this->module,
        ]);

    }


}