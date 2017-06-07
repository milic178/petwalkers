<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Region;
use app\models\City;
use app\models\AdvertType;
use app\models\Animal;

/* @var $this yii\web\View */
/* @var $model app\models\Advert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advert-form text-left">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => '6','placeholder' =>Yii::t('app','Write a short description about what you offer to potential customers maximum 300 words!')]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true,'placeholder' =>Yii::t('app','Enter a number or leave empty for later disscusion')]) ?>


    <?php
    $dataList=ArrayHelper::map(Animal::find()->asArray()->all(), 'id_animal', 'species');
    echo $form->field($model, 'id_animal')->dropDownList($dataList,
        ['prompt'=>Yii::t('app','Select a animal')])
    ?>


    <?php
    $dataList=ArrayHelper::map(AdvertType::find()->asArray()->all(), 'id_type', 'name');
    echo $form->field($model, 'id_type')->dropDownList($dataList,
        ['prompt'=>Yii::t('app','Select a course')])
    ?>


    <?=
    $form->field($model, 'id_region')
        ->dropDownList(
            ArrayHelper::map(Region::find()->asArray()->all(), 'id_region', 'name'),
            [
                'prompt'=>Yii::t('app','Select region'),
                'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('city/get-city-by-region?id=').'"+$(this).val(), function( data ) {
                  $( "select#advert-id_city" ).html( data );
                });'
            ]

        )
    ?>

    <?php
    echo $form->field($model, 'id_city')
        ->dropDownList(
            ArrayHelper::map(City::find()->asArray()->all(), 'id_city', 'name'),
            ['prompt'=>Yii::t('app','Select city'),],
            ['id'=>'cityName']
        );

    ?>



   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
