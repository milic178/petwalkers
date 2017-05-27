<?php

/**
 * Override of SettingsController from Yii2-user module
 */

namespace app\controllers;

use app\models\Profile;
use dektrium\user\controllers\SettingsController;


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
                        'message' => 'Your profile has been updated successfully',
                        'title' => 'Profile updated',
                        'positonY' => 'top',
                        'positonX' => 'right'
                ]);

                $this->trigger(self::EVENT_AFTER_PROFILE_UPDATE, $event);
                 return $this->refresh();
            endif;

        }

        return $this->render('profile', [
            'model' => $model,
        ]);
    }
}
