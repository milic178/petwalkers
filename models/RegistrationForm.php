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

use dektrium\user\models\Profile;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use dektrium\user\models\User;

class RegistrationForm extends BaseRegistrationForm
{
    public $first_name;
    public $last_name;
    public $telephone;


    public function rules()
    {
        $rules = parent::rules();

        $rules['usernameLength'] = ['username', 'string', 'min' => 5, 'max' => 255];
        $rules[] = ['first_name', 'required'];
        $rules[] = ['last_name', 'required'];
        $rules[] = ['telephone', 'required'];
        return $rules;
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['first_name'] = \Yii::t('user', 'First Name');
        $labels['last_name'] = \Yii::t('user', 'Last Name');
        $labels['telephone'] = \Yii::t('user', 'Phone number');
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
            'telephone' => $this->telephone
        ]);
        $user->setProfile($profile);
    }
}