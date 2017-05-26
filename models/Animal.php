<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "animal".
 *
 * @property integer $id_animal
 * @property string $species
 * @property integer $weight
 * @property integer $age
 *
 * @property AdvertHasAnimal[] $advertHasAnimals
 */
class Animal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'animal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['species', 'weight', 'age'], 'required'],
            [['weight', 'age'], 'integer'],
            [['species'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_animal' => 'Id Animal',
            'species' => \Yii::t('app','Species'),
            'weight' => \Yii::t('app','Weight'),
            'age' => \Yii::t('app','Animal age'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvertHasAnimals()
    {
        return $this->hasMany(AdvertHasAnimal::className(), ['id_animal' => 'id_animal']);
    }
}
