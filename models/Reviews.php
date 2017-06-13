<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property integer $id_review
 * @property string $name
 * @property string $lastname
 * @property string $petname
 * @property integer $rating
 * @property string $description
 * @property integer $used
 * @property integer $approved
 * @property string $review_code
 * @property string $created
 * @property string $valid_until
 * @property integer $id_profile
 *
 * @property Profile $idProfile
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname', 'petname', 'review_code', 'id_profile'], 'required'],
            [['rating', 'used', 'approved', 'id_profile'], 'integer'],
            [['created', 'valid_until'], 'safe'],
            [['name', 'lastname', 'petname'], 'string', 'max' => 80],
            [['description'], 'string', 'max' => 250],
            [['review_code'], 'string', 'max' => 45],
            [['id_profile'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['id_profile' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_review' => Yii::t('app', 'Id Review'),
            'name' => Yii::t('app', 'Name'),
            'lastname' => Yii::t('app', 'Last name'),
            'petname' => Yii::t('app', 'Pet name'),
            'rating' => Yii::t('app', 'Rating'),
            'description' => Yii::t('app', 'Description'),
            'used' => Yii::t('app', 'Used'),
            'approved' => Yii::t('app', 'Approved'),
            'review_code' => Yii::t('app', 'Review Code'),
            'created' => Yii::t('app', 'Created'),
            'valid_until' => Yii::t('app', 'Valid Until'),
            'id_profile' => Yii::t('app', 'Id Profile'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id_profile']);
    }
}