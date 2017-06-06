<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advert_type".
 *
 * @property integer $id_type
 * @property string $name
 * @property string $description
 *
 * @property Advert[] $adverts
 */
class AdvertType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advert_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name'], 'string', 'max' => 60],
            [['description'], 'string', 'max' => 220],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_type' => 'Id Type',
            'name' => \Yii::t('app','Advert type'),
            'description' => \Yii::t('app','Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdverts()
    {
        return $this->hasMany(Advert::className(), ['id_type' => 'id_type']);
    }

    public function showTypes(){
       return AdvertType::find()->all();
    }
}
