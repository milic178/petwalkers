<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 10.7.2017
 * Time: 22:19
 * Overriting AdminController from User module to add custom code and custom fash messages with translations!
 */


namespace app\controllers;

use dektrium\user\controllers\AdminController as BaseAdminController;
use app\models\Profile;
use dektrium\user\models\User;
use dektrium\user\models\UserSearch;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;

class AdminController extends BaseAdminController
{
    public function actionCreate()
    {
        /** @var User $user */
        $user = \Yii::createObject([
            'class'    => User::className(),
            'scenario' => 'create',
        ]);
        $event = $this->getUserEvent($user);

        $this->performAjaxValidation($user);

        $this->trigger(self::EVENT_BEFORE_CREATE, $event);
        if ($user->load(\Yii::$app->request->post()) && $user->create()) {
            \Yii::$app->getSession()->setFlash('success',[
                'type' => 'success',
                'duration' => 4500,
                'icon' => 'glyphicon glyphicon-ok-sign',
                'message' => \Yii::t('user', 'User has been created'),
                'title' => \Yii::t('kvdialog','Operation successful!'),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);

            $this->trigger(self::EVENT_AFTER_CREATE, $event);
            return $this->redirect(['update', 'id' => $user->id]);
        }

        return $this->render('create', [
            'user' => $user,
        ]);
    }



    public function actionUpdate($id)
    {
        Url::remember('', 'actions-redirect');
        $user = $this->findModel($id);
        $user->scenario = 'update';
        $event = $this->getUserEvent($user);

        $this->performAjaxValidation($user);

        $this->trigger(self::EVENT_BEFORE_UPDATE, $event);
        if ($user->load(\Yii::$app->request->post()) && $user->save()) {
            \Yii::$app->getSession()->setFlash('success',[
                'type' => 'success',
                'duration' => 4500,
                'icon' => 'glyphicon glyphicon-ok-sign',
                'message' => \Yii::t('user', 'Account details have been updated'),
                'title' => \Yii::t('kvdialog','Operation successful!'),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
            $this->trigger(self::EVENT_AFTER_UPDATE, $event);
            return $this->refresh();
        }

        return $this->render('_account', [
            'user' => $user,
        ]);
    }

    public function actionUpdateProfile($id)
    {
        Url::remember('', 'actions-redirect');
        $user    = $this->findModel($id);
        $profile = $user->profile;

        if ($profile == null) {
            $profile = \Yii::createObject(Profile::className());
            $profile->link('user', $user);
        }
        $event = $this->getProfileEvent($profile);

        $this->performAjaxValidation($profile);

        $this->trigger(self::EVENT_BEFORE_PROFILE_UPDATE, $event);

        $current_image = $profile->avatar_photo;


        if ($profile->load(\Yii::$app->request->post())) {
            $image = $profile->uploadImage();

            if(!empty($image) && $image->size !== 0) :
                $image->saveAs('uploads/'.$profile->avatar_photo);
            else:
                $profile->avatar_photo=$current_image;
            endif;

            if ($profile->save()):

                \Yii::$app->getSession()->setFlash('success',[
                    'type' => 'success',
                    'duration' => 4500,
                    'icon' => 'glyphicon glyphicon-ok-sign',
                    'message' => \Yii::t('user', 'Profile details have been updated'),
                    'title' => \Yii::t('kvdialog','Operation successful!'),
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
                $this->trigger(self::EVENT_AFTER_PROFILE_UPDATE, $event);
                return $this->refresh();
            endif;
        }

        return $this->render('_profile', [
            'user'    => $user,
            'profile' => $profile,
        ]);
    }



    public function actionConfirm($id)
    {
        $model = $this->findModel($id);
        $event = $this->getUserEvent($model);

        $this->trigger(self::EVENT_BEFORE_CONFIRM, $event);
        $model->confirm();
        $this->trigger(self::EVENT_AFTER_CONFIRM, $event);

        \Yii::$app->getSession()->setFlash('success',[
            'type' => 'success',
            'duration' => 4500,
            'icon' => 'glyphicon glyphicon-ok-sign',
            'message' =>\Yii::t('user', 'User has been confirmed'),
            'title' => \Yii::t('kvdialog','Operation successful!'),
            'positonY' => 'top',
            'positonX' => 'right'
        ]);

        return $this->redirect(Url::previous('actions-redirect'));
    }


    public function actionDelete($id)
    {
        if ($id == \Yii::$app->user->getId()) {
            \Yii::$app->getSession()->setFlash('danger',[
                'type' => 'danger',
                'duration' => 4500,
                'icon' => 'glyphicon glyphicon-remove-sign',
                'message' => \Yii::t('user', 'You can not remove your own account'),
                'title' => \Yii::t('kvdialog','Error'),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
        } else {
            $model = $this->findModel($id);
            $event = $this->getUserEvent($model);
            $this->trigger(self::EVENT_BEFORE_DELETE, $event);
            $model->delete();
            $this->trigger(self::EVENT_AFTER_DELETE, $event);

            \Yii::$app->getSession()->setFlash('success',[
                'type' => 'success',
                'duration' => 4500,
                'icon' => 'glyphicon glyphicon-ok-sign',
                'message' => \Yii::t('user', 'User has been deleted'),
                'title' => \Yii::t('kvdialog','Operation successful!'),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
        }

        return $this->redirect(['index']);
    }


    public function actionBlock($id)
    {
        if ($id == \Yii::$app->user->getId()) {
            \Yii::$app->getSession()->setFlash('danger',[
                'type' => 'danger',
                'duration' => 4500,
                'icon' => 'glyphicon glyphicon-remove-sign',
                'message' =>\Yii::t('user', 'You can not block your own account'),
                'title' => \Yii::t('kvdialog','Error'),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
        } else {
            $user  = $this->findModel($id);
            $event = $this->getUserEvent($user);
            if ($user->getIsBlocked()) {
                $this->trigger(self::EVENT_BEFORE_UNBLOCK, $event);
                $user->unblock();
                $this->trigger(self::EVENT_AFTER_UNBLOCK, $event);
                \Yii::$app->getSession()->setFlash('success',[
                    'type' => 'success',
                    'duration' => 4500,
                    'icon' => 'glyphicon glyphicon-ok-sign',
                    'message' =>  \Yii::t('user', 'User has been unblocked'),
                    'title' => \Yii::t('kvdialog','Operation successful!'),
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            } else {
                $this->trigger(self::EVENT_BEFORE_BLOCK, $event);
                $user->block();
                $this->trigger(self::EVENT_AFTER_BLOCK, $event);
                   \Yii::$app->getSession()->setFlash('success',[
                        'type' => 'success',
                        'duration' => 4500,
                        'icon' => 'glyphicon glyphicon-ok-sign',
                        'message' =>  \Yii::t('user', 'User has been blocked'),
                        'title' => \Yii::t('kvdialog','Operation successful!'),
                        'positonY' => 'top',
                        'positonX' => 'right'
                    ]);
            }
        }

        return $this->redirect(Url::previous('actions-redirect'));
    }



    public function actionResendPassword($id)
    {
        $user = $this->findModel($id);
        if ($user->isAdmin) {
            throw new ForbiddenHttpException(\Yii::t('user', 'Password generation is not possible for admin users'));
        }

        if ($user->resendPassword()) {
            \Yii::$app->getSession()->setFlash('success',[
                'type' => 'success',
                'duration' => 4500,
                'icon' => 'glyphicon glyphicon-ok-sign',
                'message' =>  \Yii::t('user', 'New Password has been generated and sent to user'),
                'title' => \Yii::t('kvdialog','Operation successful!'),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
        } else {
            \Yii::$app->getSession()->setFlash('danger',[
                'type' => 'danger',
                'duration' => 4500,
                'icon' => 'glyphicon glyphicon-remove-sign',
                'message' =>\Yii::t('user', 'Error while trying to generate new password'),
                'title' => \Yii::t('kvdialog','Error'),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
        }

        return $this->redirect(Url::previous('actions-redirect'));
    }

}