<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 20.5.2017
 * Time: 15:00
 */

namespace app\models;
use dektrium\user\models\Profile as BaseProfile;

class Profile extends BaseProfile
{

    public static function tableName()
    {
        return 'Profile';
    }

    public function rules()
    {
        return [
            [['user_id','smoker','my_animals','first_time'], 'integer'],
            [['age'], 'integer', 'min' => 16, 'max'=>85, 'message' => 'Enter a valid age'],
            [['first_name', 'last_name','telephone','avatar_photo'], 'string', 'max' => 150],

            [['avatar_photo'],'safe'],
            [['avatar_photo'], 'file', 'extensions'=>'jpg, gif, png'],
            [['avatar_photo'], 'file', 'maxSize'=>'100000'],

            [['first_name', 'last_name','telephone','about_me','age'], 'required'],
            [['avatar_photo','about_me','social_link'], 'string', 'max' => 200 ],
        ];
    }


    public function attributeLabels()
    {
      return [
            'user_id' => 'User_id',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'telephone' => 'Phone number +',
            'age' => 'Age',
            'avatar_photo' => 'Profile picture',
            'about_me' => 'About me',
            'smoker' => 'Smoker',
            'my_animals' => 'My animals',
            'social_link' => 'Social networks',
            'first_time'=>'First login'

        ];


    }

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function getUser()
    {
        return parent::getUser(); // TODO: Change the autogenerated stub
    }

    /**
     * @return string
     */




}