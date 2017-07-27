<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 20.5.2017
 * Time: 14:18
 *
 *
 * Override model RegistrationFrom from dektrium\user\models\RegistrationForm
 */


namespace app\models;

//use dektrium\user\models\Profile;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use dektrium\user\models\User;

class RegistrationForm extends BaseRegistrationForm
{
    public $first_name;
    public $last_name;
    public $telephone;
    public $avatar_photo;
    public $repeat_password;


    public function rules()
    {
        $rules = parent::rules();

        $rules['usernameLength'] = ['username', 'string', 'min' => 5, 'max' => 255];
        $rules[] = ['first_name', 'required'];
        $rules[] = ['last_name', 'required'];
        $rules[] = ['telephone', 'required'];
        $rules[] = ['telephone', 'integer','message' => \Yii::t('app','Must be a valid phone number, no empty spaces or strings')];
        $rules[] = ['repeat_password', 'compare', 'compareAttribute'=>'password', 'skipOnEmpty' => false, 'message'=>\Yii::t('app','Passwords don\'t match!')];

        return $rules;
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['first_name'] = \Yii::t('user', 'First Name');
        $labels['last_name'] = \Yii::t('user', 'Last Name');
        $labels['telephone'] = \Yii::t('user', 'Phone number');
        $labels['avatar_photo'] = \Yii::t('user', 'Avatar Photo');
        $labels['repeat_password'] = \Yii::t('app', 'Repeat password');
        return $labels;
    }


    public function loadAttributes(User $user)
    {
        $user->setAttributes($this->attributes);

        /** @var Profile $profile */
        $profile = \Yii::createObject(Profile::className());
        $profile->setAttributes([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'telephone' => $this->telephone,
            'avatar_photo' => $this->avatar_photo,
        ]);
        $user->setProfile($profile);
    }


    /**
     * Registers a new user account. If registration was successful it will set flash message.
     *
     * @return bool
     */
    public function register()
    {
        if (!$this->validate()) {
            return false;
        }

        /** @var User $user */
        $user = \Yii::createObject(User::className());
        $user->setScenario('register');
        $this->loadAttributes($user);

        if (!$user->register()) {
            return false;
        }

        \Yii::$app->getSession()->setFlash('info',[
            'type' => 'info',
            'duration' => 5500,
            'icon' => 'glyphicon glyphicon-info-sign',
            'message' => \Yii::t('app','Confirmation message with further instructions has been sent to your e-mail.'),
            'title' => \Yii::t('app','Your account has been created!'),
            'positonY' => 'top',
            'positonX' => 'right'
        ]);
        return true;

    }
}