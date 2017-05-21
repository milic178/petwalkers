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
            [['user_id'], 'integer'],
            [['fist_name', 'last_name'], 'string', 'max' => 150],
        ];
    }


    public function attributeLabels()
    {
      return [
            'user_id' => 'User_id',
            'fist_name' => 'First Name',
            'last_name' => 'Last Name',
        ];


    }


}