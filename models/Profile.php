<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 20.5.2017
 * Time: 15:00
 */

namespace app\models;
use dektrium\user\models\Profile as BaseProfile;
use yii\web\UploadedFile;

class Profile extends BaseProfile
{
    /**
     * @var mixed image the attribute for rendering the file input
     * widget for upload on the form
     */





    public static function tableName()
    {
        return 'profile';
    }

    public function rules()
    {
        return [
            [['user_id','smoker','my_animals','first_time','telephone'], 'integer'],
            [['age'], 'integer', 'min' => 16, 'max'=>85, 'message' => \Yii::t('app','Enter a valid age')],
            [['first_name', 'last_name','avatar_photo'], 'string', 'max' => 150],

            [['avatar_photo','filename'],'safe'],
            [['avatar_photo'], 'file', 'extensions'=>'jpg, gif, png'],
          //  [['avatar_photo'], 'default', 'value'=> 'default_user.jpg'],

            [['first_name', 'last_name','telephone','about_me','age'], 'required'],
            [['avatar_photo','about_me','social_link'], 'string', 'max' => 550 ],

            [['social_link'], 'url', 'defaultScheme' => 'http'],
        ];
    }


    public function attributeLabels()
    {
      return [
            'user_id' => 'User_id',
            'first_name' => \Yii::t('app','First Name'),
            'last_name' => \Yii::t('app','Last Name'),
            'telephone' => \Yii::t('app','Phone number +'),
            'age' => \Yii::t('app','Age'),
            'avatar_photo' => \Yii::t('app','Profile picture'),
            'about_me' => \Yii::t('app','About me'),
            'smoker' => \Yii::t('app','Smoker'),
            'my_animals' => \Yii::t('app','My animals'),
            'social_link' => \Yii::t('app','Social networks'),
            'first_time'=>'First login',


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


    /**
     * fetch stored image file name with complete path
     * @return string
     */
    public function getImageFile()
    {
        return isset($this->avatar_photo) ? \Yii::$app->params['uploadPath'] . $this->avatar_photo : null;
    }

    /**
     * fetch stored image url
     * @return string
     */
    public function getImageUrl()
    {
        // return a default image placeholder if your source avatar is not found
        $avatar_photo = isset($this->avatar_photo) ? $this->avatar_photo : 'default_user.jpg';
        return \Yii::$app->params['uploadUrl'] . $avatar_photo;
    }

    /**
     * Process upload of image
     *
     * @return mixed the uploaded image instance
     */
    public function uploadImage() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $image=UploadedFile::getInstance($this,'avatar_photo');


        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }
        $this->avatar_photo = \Yii::$app->security->generateRandomString().'.'.$image->extension;
        // the uploaded image instance
        return $image;
    }




}

