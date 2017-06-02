<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Region;
use app\models\AdvertType;

/* @var $this yii\web\View */
/* @var $model app\models\Advert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => '6','placeholder' =>Yii::t('app','Write a short description about you 200 words max!')]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'id_type')
        ->dropDownList(
            ArrayHelper::map(AdvertType::find()->asArray()->all(), 'id_type', 'name')
        )
    ?>

    <?=
    $form->field($model, 'id_region')
        ->dropDownList(
            ArrayHelper::map(Region::find()->asArray()->all(), 'id_region', 'name')
        )
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
