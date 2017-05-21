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
    public $fist_name;
    public $last_name;


    public function rules()
    {
        $rules = parent::rules();

        $rules['usernameLength'] = ['username', 'string', 'min' => 5, 'max' => 255];
        $rules[] = ['fist_name', 'required'];
        $rules[] = ['last_name', 'required'];

        return $rules;
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['fist_name'] = \Yii::t('user', 'First Name');
        $labels['last_name'] = \Yii::t('user', 'Last Name');
        return $labels;
    }


    public function loadAttributes(User $user)
    {
        $user->setAttributes($this->attributes);

        /** @var Profile $profile */
        $profile = \Yii::createObject(Profile::className());
        $profile->setAttributes([
            'fist_name' => $this->fist_name,
            'last_name' => $this->last_name
        ]);
        $user->setProfile($profile);
    }
}