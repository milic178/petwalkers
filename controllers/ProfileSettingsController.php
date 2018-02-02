<?php

/**
 * Override of SettingsController from Yii2-user module
 */

namespace app\controllers;

use app\models\Profile;
use dektrium\user\controllers\SettingsController;
use dektrium\user\models\SettingsForm;
use yii\web\ForbiddenHttpException;


class ProfileSettingsController extends SettingsController
{
    /** Shows profile settings form and updates on submit if user is not demoUser.
     * @return string|\yii\web\Response
     */
    public function actionProfile()
    {
        $model = $this->finder->findProfileById(\Yii::$app->user->identity->getId());

        if ($model == null) {
            $model = \Yii::createObject(Profile::className());
            $model->link('user', \Yii::$app->user->identity);
        }

        $event = $this->getProfileEvent($model);

        $this->performAjaxValidation($model);

        $this->trigger(self::EVENT_BEFORE_PROFILE_UPDATE, $event);

        $current_image = $model->avatar_photo;

        if ($model->load(\Yii::$app->request->post()) && $model->user->username != "demoUser" ) {

            $image = $model->uploadImage();

            if(!empty($image) && $image->size !== 0) :
                $image->saveAs('uploads/'.$model->avatar_photo);
            else:
                $model->avatar_photo=$current_image;
            endif;

            if ($model->save()):

                \Yii::$app->getSession()->setFlash('success',[
                        'type' => 'success',
                        'duration' => 4500,
                        'icon' => 'glyphicon glyphicon-ok-sign',
                        'message' => \Yii::t('app','Your profile has been updated successfully'),
                        'title' => \Yii::t('kvdialog','Operation successful!'),
                        'positonY' => 'top',
                        'positonX' => 'right'
                ]);

                $this->trigger(self::EVENT_AFTER_PROFILE_UPDATE, $event);
                return $this->refresh();
            endif;
        }

        elseif ($model->load(\Yii::$app->request->post()) && $model->user->username == "demoUser"){
            throw new ForbiddenHttpException(\Yii::t('app', 'demoUser profile configuration is disabled for policy reasons. You are welcome to register.'));
        };

        return $this->render('profile', [
            'model' => $model,
        ]);
    }



    /**
     * Displays page where user can update account settings (username, email or password).
     *
     * @return string|\yii\web\Response
     */
    public function actionAccount()
    {
        /** @var SettingsForm $model */
        $model = \Yii::createObject(SettingsForm::className());
        $event = $this->getFormEvent($model);

        $this->performAjaxValidation($model);

        // unless it demoUser with id 72
        $loggedUser = \Yii::$app->user->identity->getId();
        if ($loggedUser == 72){
            throw new ForbiddenHttpException(\Yii::t('app', 'demoUser profile configuration is disabled for policy reasons. You are welcome to register.'));
        }
        $this->trigger(self::EVENT_BEFORE_ACCOUNT_UPDATE, $event);
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success',[
                'type' => 'success',
                'duration' => 5500,
                'icon' => 'glyphicon glyphicon-ok-sign',
                'message' => \Yii::t('user', 'Your account details have been updated'),
                'title' => \Yii::t('kvdialog','Operation successful!'),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
            $this->trigger(self::EVENT_AFTER_ACCOUNT_UPDATE, $event);
            return $this->refresh();
        }


        return $this->render('account', [
            'model' => $model,
        ]);
    }
}
