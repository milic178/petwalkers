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
 * @property integer $id_region
 * @property string $trash_date
 *
 * @property User $idUser
 * @property AdvertType $idType
 * @property Region $idRegion
 * @property AdvertHasAnimal[] $advertHasAnimals
 */
class Advert extends \yii\db\ActiveRecord
{
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
            [['title', 'description', 'price', 'id_user', 'id_type', 'id_region'], 'required'],
            [['created', 'valid_until', 'trash_date'], 'safe'],
            [['price'], 'number'],
            [['id_user', 'id_type', 'id_region'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 60],
            [['description'], 'string', 'max' => 220],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_type'], 'exist', 'skipOnError' => true, 'targetClass' => AdvertType::className(), 'targetAttribute' => ['id_type' => 'id_type']],
            [['id_region'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['id_region' => 'id_region']],
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
            'price' => Yii::t('app', 'Price/h'),
            'id_user' => Yii::t('app', 'Walker'),
            'id_type' => Yii::t('app', 'Type'),
            'id_region' => Yii::t('app', 'Region'),
            'trash_date' => Yii::t('app', 'Trash Date'),
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
    public function getIdRegion()
    {
        return $this->hasOne(Region::className(), ['id_region' => 'id_region']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvertHasAnimals()
    {
        return $this->hasMany(AdvertHasAnimal::className(), ['id_advert' => 'id_advert']);
    }
}
