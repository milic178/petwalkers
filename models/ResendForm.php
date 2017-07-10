<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 10.7.2017
 * Time: 21:18
 * Override model ResendForm from dektrium\user\models\ResendForm
 */

namespace app\models;

use dektrium\user\models\ResendForm as BaseResendForm;


use dektrium\user\models\Token;

class ResendForm extends BaseResendForm
{

    public function resend()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = $this->finder->findUserByEmail($this->email);

        if ($user instanceof User && !$user->isConfirmed) {
            /** @var Token $token */
            $token = \Yii::createObject([
                'class' => Token::className(),
                'user_id' => $user->id,
                'type' => Token::TYPE_CONFIRMATION,
            ]);
            $token->save(false);
            $this->mailer->sendConfirmationMessage($user, $token);
        }

        \Yii::$app->getSession()->setFlash('info',[
            'type' => 'info',
            'duration' => 5500,
            'icon' => 'glyphicon glyphicon-info-sign',
            'message' => \Yii::t('user','A message has been sent to your email address. It contains a confirmation link that you must click to complete registration.'),
            'title' => \Yii::t('kvdialog','Information'),
            'positonY' => 'top',
            'positonX' => 'right'
        ]);

        return true;
    }
}
?>