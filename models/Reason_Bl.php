<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reason_bl".
 *
 * @property integer $id
 * @property string $category
 *
 * @property BlackListed[] $blackListeds
 */
class Reason_Bl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reason_bl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['category'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlackListeds()
    {
        return $this->hasMany(BlackListed::className(), ['id_type' => 'id']);
    }
}
