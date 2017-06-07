<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advert".
 *
 * @property integer $id_advert
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $created
 * @property string $valid_until
 * @property string $price
 * @property integer $id_user
 * @property integer $id_type
 * @property integer $id_city
 * @property integer $id_animal
 * @property string $trash_date
 *
 * @property User $idUser
 * @property AdvertType $idType
 * @property City $idCity
 * @property AdvertHasAnimal[] $advertHasAnimals
 */
class Advert extends \yii\db\ActiveRecord
{
    public $id_region;
    public $less_than;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'price', 'id_user', 'id_type', 'id_city'], 'required'],
            [['created', 'valid_until', 'trash_date'], 'safe'],
            [['price'], 'number'],
            [['id_user', 'id_type', 'id_city','id_animal'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 60],
            [['description'], 'string', 'max' => 1000],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_type'], 'exist', 'skipOnError' => true, 'targetClass' => AdvertType::className(), 'targetAttribute' => ['id_type' => 'id_type']],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['id_city' => 'id_city']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_advert' => Yii::t('app', 'Id Advert'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'description' => Yii::t('app', 'Description'),
            'created' => Yii::t('app', 'Created'),
            'valid_until' => Yii::t('app', 'Valid until'),
            'price' => Yii::t('app', 'Price €/h'),
            'id_user' => Yii::t('app', 'Walker'),
            'id_type' => Yii::t('app', 'Type'),
            'id_city' => Yii::t('app', 'City'),
            'id_animal'=>Yii::t('app','Animal'),
            'trash_date' => Yii::t('app', 'Trash Date'),
            'id_region'=>Yii::t('app', 'Region'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdType()
    {
        return $this->hasOne(AdvertType::className(), ['id_type' => 'id_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCity()
    {
        return $this->hasOne(City::className(), ['id_city' => 'id_city']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAnimal()
    {
        return $this->hasOne(Animal::className(), ['id_animal' => 'id_animal']);
    }


    /** Finds if user has already advert with those parametes
     * @param $type
     * @param $city
     * @param $animal
     * @param $user
     * @return bool
     */
    public function duplicateAdvert($type,$city,$animal,$user){

        return Advert::find()
            ->where(['id_type'=> $type,'id_city'=> $city, 'id_animal'=> $animal,'id_user'=> $user])
            ->exists();
    }
}
