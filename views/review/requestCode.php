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
    <?=Yii::t('app','To get walker contant information put your') ?>
</p>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id' => 'profile-form',
                    'options' => ['class' => 'form-horizontal','enctype'=>'multipart/form-data'],
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                    'validateOnBlur' => false,
                ]); ?>

                <?= $form->field($model, 'name') ?>

                <?= $form->field($model, 'lastname') ?>

                <?= $form->field($model, 'petname') ?>


                <div class="form-group">
                        <?= Html::button(Yii::t('user','Request code'),
                            [
                                'id'=>'btn-custom',
                                'class' => 'btn btn-block btn-success',
                            ]) ?>

                        <br>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
