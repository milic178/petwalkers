<?php

/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $user
 * @var dektrium\user\models\Profile $profile
 */
?>

<?php $this->beginContent('@dektrium/user/views/admin/update.php', ['user' => $user]) ?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-9',
        ],
    ],
]); ?>

<?= $form->field($profile, 'first_name') ?>

<?= $form->field($profile, 'last_name') ?>

<?= $form->field($profile, 'telephone')->textInput(['maxlength'=>12]) ?>

<?= $form->field($profile, 'age')->textInput(['maxlength'=>2]) ?>

<?= $form->field($profile, 'avatar_photo')->fileInput()->hint(Yii::t('user', 'Upoload your photo')) ?>


<?= $form->field($profile, 'about_me')->textarea(['rows' => '6','placeholder' =>'Write something about yourself in few words']) ?>

<?= $form->field($profile, 'smoker')->radioList(array('1'=>'Yes',0=>'No')); ?>

<?= $form->field($profile, 'my_animals') ?>

<?= $form->field($profile, 'social_link') ?>

<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <?= Html::submitButton(Yii::t('user', 'Update'),
            [
            'class' => 'btn btn-block btn-success',
            'data-confirm' => Yii::t('yii', 'Are you sure you want to update user profile'),
        ]) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php $this->endContent() ?>
