<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 13.6.2017
 * Time: 19:23
 *
 * Form view for requesting code to leave user review
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<p>
    <?=Yii::t('app','To get walker contant information fill this form') ?>
    <i class="fa fa-smile-o" aria-hidden="true"></i>
</p>
            <div class="panel-body">

                <?php $form = ActiveForm::begin([
                        'id' => 'request-code-form',
                        'enableClientValidation' => true,
                    ]); ?>

                    <?= $form->field($model, 'name') ?>

                    <?= $form->field($model, 'lastname') ?>

                    <?= $form->field($model, 'petname') ?>

                    <?= Html::submitButton(Yii::t('app','Request code'),
                                [
                                    'name' => 'request-code-submit-button',
                                    'id'=>'request-code-submit-button',
                                    'class' => 'btn btn-block btn-success',
                                ]) ?>
                <?php ActiveForm::end(); ?>
            </div>

