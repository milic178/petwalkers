<?php

namespace app\models;
use dektrium\user\models\User as BaseUser;
use dektrium\user\models\Token;
use dektrium\user\Module;

class User extends BaseUser
{
/*    const ROLE_USER = 10;
    const ROLE_ADMIN = 30;


    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['role'] = 'role';
        return $labels;

    }
*/
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
                    'message' => \Yii::t('user','Welcome! Registration is complete.'),
                    'title' => \Yii::t('user','Thank you.'),
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);

            } else {

                \Yii::$app->getSession()->setFlash('danger',[
                    'type' => 'danger',
                    'duration' => 5500,
                    'icon' => 'glyphicon glyphicon-remove-sign',
                    'message' =>\Yii::t('user','Something went wrong your account has not been confirmed!'),
                    'title' => \Yii::t('kvdialog','Error'),
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            }
        } else {
            $success = false;
                \Yii::$app->getSession()->setFlash('danger',[
                'type' => 'danger',
                'duration' => 5500,
                'icon' => 'glyphicon glyphicon-remove-sign',
                'message' => \Yii::t('user','The confirmation link is invalid or expired. Please try requesting a new one!'),
                'title' => \Yii::t('kvdialog','Error'),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
        }

        return $success;
    }


    /**
     * This method attempts changing user email. If user's "unconfirmed_email" field is empty is returns false, else if
     * somebody already has email that equals user's "unconfirmed_email" it returns false, otherwise returns true and
     * updates user's password.
     *
     * @param string $code
     *
     * @return bool
     * @throws \Exception
     */
    public function attemptEmailChange($code)
    {
        // TODO refactor method

        /** @var Token $token */
        $token = $this->finder->findToken([
            'user_id' => $this->id,
            'code'    => $code,
        ])->andWhere(['in', 'type', [Token::TYPE_CONFIRM_NEW_EMAIL, Token::TYPE_CONFIRM_OLD_EMAIL]])->one();

        if (empty($this->unconfirmed_email) || $token === null || $token->isExpired) {
            \Yii::$app->getSession()->setFlash('danger',[
                'type' => 'danger',
                'duration' => 5500,
                'icon' => 'glyphicon glyphicon-remove-sign',
                'message' =>\Yii::t('user','Your confirmation token is invalid or expired'),
                'title' => \Yii::t('kvdialog','Error'),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
        } else {
            $token->delete();

            if (empty($this->unconfirmed_email)) {
                \Yii::$app->getSession()->setFlash('danger',[
                    'type' => 'danger',
                    'duration' => 5500,
                    'icon' => 'glyphicon glyphicon-remove-sign',
                    'message' =>\Yii::t('user', 'An error occurred processing your request'),
                    'title' => \Yii::t('kvdialog','Error'),
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            } elseif ($this->finder->findUser(['email' => $this->unconfirmed_email])->exists() == false) {
                if ($this->module->emailChangeStrategy == Module::STRATEGY_SECURE) {
                    switch ($token->type) {
                        case Token::TYPE_CONFIRM_NEW_EMAIL:
                            $this->flags |= self::NEW_EMAIL_CONFIRMED;
                            \Yii::$app->getSession()->setFlash('success',[
                                'type' => 'success',
                                'duration' => 5500,
                                'icon' => 'glyphicon glyphicon-ok-sign',
                                'message' => \Yii::t('user','Awesome, almost there. Now you need to click the confirmation link sent to your old email address'),
                                'title' => \Yii::t('user','Thank you.'),
                                'positonY' => 'top',
                                'positonX' => 'right'
                            ]);

                            break;
                        case Token::TYPE_CONFIRM_OLD_EMAIL:
                            $this->flags |= self::OLD_EMAIL_CONFIRMED;
                            \Yii::$app->getSession()->setFlash('success',[
                                'type' => 'success',
                                'duration' => 5500,
                                'icon' => 'glyphicon glyphicon-ok-sign',
                                'message' => \Yii::t('user','Awesome, almost there. Now you need to click the confirmation link sent to your new email address'),
                                'title' => \Yii::t('user','Thank you.'),
                                'positonY' => 'top',
                                'positonX' => 'right'
                            ]);
                            break;
                    }
                }
                if ($this->module->emailChangeStrategy == Module::STRATEGY_DEFAULT
                    || ($this->flags & self::NEW_EMAIL_CONFIRMED && $this->flags & self::OLD_EMAIL_CONFIRMED)) {
                    $this->email = $this->unconfirmed_email;
                    $this->unconfirmed_email = null;
                    \Yii::$app->session->setFlash('success', \Yii::t('user', 'Your email address has been changed'));
                }
                $this->save(false);
            }
        }
    }


}
