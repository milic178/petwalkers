<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View              $this
 * @var yii\widgets\ActiveForm    $form
 * @var dektrium\user\models\User $user
 */

$this->title = Yii::t('user', 'Register');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id' => 'registration-form',
                ]); ?>


                <?= $form->field($model, 'first_name',[
                    'template' => '
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                {input}
            </div>
            {error}',
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('first_name'),
                        'class'=>'form-control',
                    ]])
                ?>

                <?= $form->field($model, 'last_name',[
                    'template' => '
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                {input}
            </div>
            {error}',
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('last_name'),
                        'class'=>'form-control',
                    ]])
                ?>

                <?= $form->field($model, 'telephone',[
                    'template' => '
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                {input}
            </div>
            {error}',
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('telephone'),
                        'class'=>'form-control',
                    ]])
                ?>

                <?= $form->field($model, 'email',[
                    'template' => '
            <div class="input-group">
                <span class="input-group-addon "><i class="glyphicon glyphicon-envelope"></i></span>
                {input}
            </div>
            {error}',
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('email'),
                        'class'=>'form-control',
                    ]])
                ?>

                <?= $form->field($model, 'username',[
                    'template' => '
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
                {input}
            </div>
            {error}',
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('username'),
                        'class'=>'form-control',
                    ]])
                ?>

                <?= $form->field($model, 'password',[
                    'template' => '
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                {input}
            </div>
            {error}',
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('password'),
                        'class'=>'form-control',
                    ]])->passwordInput()
                ?>


                <?=  $form->field($model, 'avatar_photo')
                    ->hiddenInput(['value' => 'default_user.jpg'])
                    ->label(false) ?>

                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
        </p>
    </div>
</div>



