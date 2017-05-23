<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 21.5.2017
 * Time: 12:17
 *
 *  Overriding view profile from Yii2-uder module
 */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $model
 */

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
if($model->first_time == 0):
    \Yii::$app->getSession()->setFlash('info',[
        'type' => 'info',
        'duration' => 5500,
        'icon' => 'glyphicon glyphicon-info-sign',
        'message' => 'Finish setting up your profile to attract more customers!',
        'title' => 'Your account is active!',
        'positonY' => 'top',
        'positonX' => 'right'
    ]);
endif;

 ?>



<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="row">
    <div class="col-md-3">

        <?= $this->render('_menu') ?>
    </div>

    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id' => 'profile-form',
                    'options' => ['class' => 'form-horizontal','enctype'=>'multipart/form-data'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                    'validateOnBlur' => false,
                ]); ?>

                <?= $form->field($model, 'first_name') ?>

                <?= $form->field($model, 'last_name') ?>

                <?= $form->field($model, 'telephone')->textInput(['maxlength'=>12]) ?>

                <?= $form->field($model, 'age')->textInput(['maxlength'=>2]) ?>


                <?= $form->field($model, 'avatar_photo')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                ]);  ?>


                <?= $form->field($model, 'about_me')->textarea(['rows' => '6','placeholder' =>'Write something about yourself in few words']) ?>

                <?= $form->field($model, 'smoker')->radioList(array('1'=>'Yes',0=>'No')); ?>

                <?= $form->field($model, 'my_animals')->textInput(['placeholder' => 'Do you have any pets at home?']) ?>

                <?= $form->field($model, 'social_link') ->textInput(['placeholder' => 'Url to your social profile (Optional)']) ?>

                <?=$form->field($model, 'first_time')->hiddenInput(['value'=> 1])->label(false)?>

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <?= Html::submitButton(Yii::t('user', 'Save'),
                            [
                            'class' => 'btn btn-block btn-success',
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to update profile'),
                            ]) ?>
                        <br>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
