<?php

/**
 * Override of SettingsController from Yii2-user module
 */

namespace app\controllers;

use dektrium\user\controllers\SettingsController;
use yii\web\UploadedFile;

class ProfileSettingsController extends SettingsController
{
    /** Shows profile settings form.
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

        if ($model->load(\Yii::$app->request->post())) {

            $image = $model->uploadImage();
//print_r($image);die();
            if(!empty($image) && $image->size !== 0) :
                $image->saveAs('uploads/'.$model->avatar_photo);


            else:
                $model->avatar_photo=$current_image;

            endif;
            $model->save();

            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Your profile has been updated'));
            $this->trigger(self::EVENT_AFTER_PROFILE_UPDATE, $event);
            return $this->render('profile', [
                'model' => $model,
            ]);
        }

        return $this->render('profile', [
            'model' => $model,
        ]);
    }
}
