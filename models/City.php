<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id_city
 * @property string $name
 * @property string $zip_code
 * @property integer $id_region
 *
 * @property Region $idRegion
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'zip_code', 'id_region'], 'required'],
            [['id_region','zip_code'], 'integer'],
            [['name'], 'string', 'max' => 80],
            [['zip_code'], 'string', 'max' => 10],
            [['id_region'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['id_region' => 'id_region']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_city' => Yii::t('app', 'Id City'),
            'name' => Yii::t('app', 'Name'),
            'zip_code' => Yii::t('app', 'Zip Code'),
            'id_region' => Yii::t('app', 'Region'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRegion()
    {
        return $this->hasOne(Region::className(), ['id_region' => 'id_region']);
    }
}
