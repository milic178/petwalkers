<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 13.6.2017
 * Time: 13:43
 *
 * View for entering review code!
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\IndexAsset;



$this->title = Yii::t('app', 'Enter review code');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Review code')];
$this->params['breadcrumbs'][] = $this->title;
IndexAsset::register($this);
?>


<div class="review-code-form">
    <?php $form = ActiveForm::begin([ 'enableClientValidation' => true,
        'options'=> [
            'id' => 'review-code-form'
        ]]);
    ?>
<p>
    <?=Yii::t('app','Enter the code to write a review about your experience with walker you booked') ?>
</p>
    <?= $form->field($model, 'review_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Enter code'), ['class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>





