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
use kartik\file\FileInput;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $user
 * @var dektrium\user\models\Profile $profile
 */
?>

<?php $this->beginContent('@dektrium/user/views/admin/update.php', ['user' => $user]) ?>
<div class="panel-heading">
    <h3 class="panel-title" align="center">
        <?=  Html::img($user->profile->getImageUrl(), [
            'class'=>'img-thumbnail',
            'width'=>'40%',
            'height'=>'40%',
            'title'=>$user->profile->first_name,
        ]); ?>

    </h3>
</div>
<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'options' => ['enctype' => 'multipart/form-data'],
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

<?= $form->field($profile, 'avatar_photo')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
]);  ?>


<?= $form->field($profile, 'about_me')->textarea(['rows' => '6','placeholder' =>'Write something about yourself in few words']) ?>

<?= $form->field($profile, 'smoker')->radioList(array('1'=>'Yes',0=>'No')); ?>

<?= $form->field($profile, 'my_animals')->textInput(['placeholder' => 'Do you have any pets at home?']) ?>

<?= $form->field($profile, 'social_link') ->textInput(['placeholder' => 'Url to your social profile (Optional)']) ?>

<?=$form->field($profile, 'first_time')->hiddenInput(['value'=> 1])->label(false)?>


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
