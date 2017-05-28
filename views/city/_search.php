<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\\models\CitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_city') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'zip_code') ?>

    <?= $form ->field($model, 'id_region')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Region::find()->all(),'id_region','name'),
        ['prompt'=>Yii::t('app','Select Region')]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
