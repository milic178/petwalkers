<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 10.7.2017
 * Time: 21:25
 * Override model SettingsForm from dektrium\user\models\SettingsForm
 */


namespace app\models;

use dektrium\user\models\SettingsForm as BaseSettingsForm;
use dektrium\user\models\Token;


class SettingsForm extends BaseSettingsForm
{
    protected function insecureEmailChange()
    {
        $this->user->email = $this->email;
        \Yii::$app->getSession()->setFlash('success',[
            'type' => 'success',
            'duration' => 4500,
            'icon' => 'glyphicon glyphicon-ok-sign',
            'message' => \Yii::t('user', 'Your email address has been changed'),
            'title' => \Yii::t('kvdialog','Operation successful!'),
            'positonY' => 'top',
            'positonX' => 'right'
        ]);
    }

    protected function defaultEmailChange()
    {
        $this->user->unconfirmed_email = $this->email;
        /** @var Token $token */
        $token = \Yii::createObject([
            'class'   => Token::className(),
            'user_id' => $this->user->id,
            'type'    => Token::TYPE_CONFIRM_NEW_EMAIL,
        ]);
        $token->save(false);
        $this->mailer->sendReconfirmationMessage($this->user, $token);
        \Yii::$app->getSession()->setFlash('info',[
            'type' => 'info',
            'duration' => 5500,
            'icon' => 'glyphicon glyphicon-info-sign',
            'message' => \Yii::t('user', 'A confirmation message has been sent to your new email address'),
            'title' => \Yii::t('kvdialog','Information'),
            'positonY' => 'top',
            'positonX' => 'right'
        ]);
    }

    protected function secureEmailChange()
    {
        $this->defaultEmailChange();
        /** @var Token $token */
        $token = \Yii::createObject([
            'class'   => Token::className(),
            'user_id' => $this->user->id,
            'type'    => Token::TYPE_CONFIRM_OLD_EMAIL,
        ]);
        $token->save(false);
        $this->mailer->sendReconfirmationMessage($this->user, $token);

        // unset flags if they exist
        $this->user->flags &= ~User::NEW_EMAIL_CONFIRMED;
        $this->user->flags &= ~User::OLD_EMAIL_CONFIRMED;
        $this->user->save(false);

        \Yii::$app->getSession()->setFlash('info',[
            'type' => 'info',
            'duration' => 5500,
            'icon' => 'glyphicon glyphicon-info-sign',
            'message' => \Yii::t('user','We have sent confirmation links to both old and new email addresses. You must click both links to complete your request'),
            'title' => \Yii::t('kvdialog','Information'),
            'positonY' => 'top',
            'positonX' => 'right'
        ]);


    }
}