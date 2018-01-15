<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 10.7.2017
 * Time: 18:52
 * Override model RegistrationFrom from dektrium\user\models\RecoveryForm
 */

namespace app\models;


use dektrium\user\models\Token;
use dektrium\user\models\RecoveryForm as BaseRecoveryForm;

class RecoveryForm extends BaseRecoveryForm
{
    public function sendRecoveryMessage()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = $this->finder->findUserByEmail($this->email);

        if (isset($user)) {
            /** @var Token $token */
            $token = \Yii::createObject([
                'class' => Token::className(),
                'user_id' => $user->id,
                'type' => Token::TYPE_RECOVERY,
            ]);

            if (!$token->save(false)) {
                return false;
            }

            if (!$this->mailer->sendRecoveryMessage($user, $token)) {
                return false;
            }

            \Yii::$app->getSession()->setFlash('info',[
                'type' => 'info',
                'duration' => 5500,
                'icon' => 'glyphicon glyphicon-info-sign',
                'message' => \Yii::t('kvdialog','An email has been sent with instructions for resetting your password!'),
                'title' => \Yii::t('kvdialog','Information'),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
            return true;
        }
        else{
            return false;
        }

    }

    public function resetPassword(Token $token)
    {
        if (!$this->validate() || $token->user === null) {
            return false;
        }

        if ($token->user->resetPassword($this->password)) {
            \Yii::$app->getSession()->setFlash('success',[
                'type' => 'success',
                'duration' => 5500,
                'icon' => 'glyphicon glyphicon-ok-sign',
                'message' => \Yii::t('user', 'Your password has been changed successfully.'),
                'title' => \Yii::t('user','Profile updated successfully'),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
            $token->delete();
        } else {
            \Yii::$app->getSession()->setFlash('danger',[
                'type' => 'danger',
                'duration' => 5500,
                'icon' => 'glyphicon  glyphicon-remove-sign',
                'message' =>  \Yii::t('user', 'An error occurred and your password has not been changed. Please try again later.'),
                'title' => \Yii::t('kvdialog','Error'),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
        }

        return true;
    }
}