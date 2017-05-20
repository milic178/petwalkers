<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 20.5.2017
 * Time: 15:00
 */

namespace app\models;

/**
 * Description Profile
 *
 * This form @overrides dektrium\user\models\Profile
 */
use dektrium\user\models\Profile as BaseProfile;

class Profile extends BaseProfile {
    public $fist_name;
    public $last_name;
    public $telephone;
    /**
     * public variables to be added to the model
     */


    public function rules() {
      //  $rules = parent::rules();

        $rules['fist_name'] = ['fist_name', 'string'];
        $rules['last_name'] = ['last_name', 'string'];
        $rules['telephone'] = ['telephone', 'string'];
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        //$labels = parent::attributeLabels();
        $labels['fist_name'] = \Yii::t('user', 'First name');
        $labels['last_name'] = \Yii::t('user', 'Last name');
        $labels['telephone'] = \Yii::t('user', 'Telephone');
        return $labels;
    }

}