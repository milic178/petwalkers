<?php

namespace app\models;
use dektrium\user\models\User as BaseProfile;
use dektrium\user\models\Token;

class User extends BaseProfile
{

    /**
     * Attempts user confirmation.
     *
     * @param string $code Confirmation code.
     *
     * @return boolean
     */
    public function attemptConfirmation($code)
    {
        $token = $this->finder->findTokenByParams($this->id, $code, Token::TYPE_CONFIRMATION);

        if ($token instanceof Token && !$token->isExpired) {
            $token->delete();
            if (($success = $this->confirm())) {
                \Yii::$app->user->login($this, $this->module->rememberFor);

                \Yii::$app->getSession()->setFlash('success',[
                    'type' => 'success',
                    'duration' => 5500,
                    'icon' => 'glyphicon glyphicon-ok-sign',
                    'message' => 'Registration is now complete!',
                    'title' => 'Thank you',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);

            } else {

                \Yii::$app->getSession()->setFlash('danger',[
                    'type' => 'danger',
                    'duration' => 5500,
                    'icon' => 'glyphicon glyphicon-remove-sign',
                    'message' => 'Something went wrong your account has not been confirmed!',
                    'title' => 'Oh snap',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            }
        } else {
            $success = false;
           $message = \Yii::$app->getSession()->setFlash('danger',[
                'type' => 'danger',
                'duration' => 5500,
                'icon' => 'glyphicon glyphicon-remove-sign',
                'message' => 'The confirmation link is invalid or expired. Please try requesting a new one!',
                'title' => 'Oh snap',
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
        }

        return $success;
    }




}
