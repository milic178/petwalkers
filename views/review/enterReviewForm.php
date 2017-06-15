<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 15.6.2017
 * Time: 9:38
 *
 * View form for leaving review to user!
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\rating\StarRating;

$this->title = Yii::t('app', 'Review');
$this->params['breadcrumbs'][] = $this->title;

?>
<!--popup with success message -->
<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<h3>
        <?=Yii::t('app','Hi {name} {lastname}, how are you today? And how is {petname} doing? Write a short review bout your experience with {user_name} so we can build a better community!',['name'=> $review->name, 'lastname'=> $review->lastname, 'petname'=> $review->petname, 'user_name'=> $profile->first_name, ]);    ?>
</h3>
<br>
<div class="row">
        <div class="col-md-4">
                <div class="panel panel-default">
                <div class="panel-heading">
                        <h3 class="panel-title">
                                <?=  Html::img($profile->getImageUrl(), [
                                    'class'=>'img-thumbnail',
                                    'width'=>'100%',
                                    'height'=>'10%',
                                    'title'=>$profile->first_name,
                                ]); ?>
                        </h3>
                </div>
                </div>
        </div>

        <div class="col-md-8">
                <div class="panel panel-default">
                <div class="panel-heading">
                        <?= Html::encode($this->title) ?>
                </div>
                        <div class="panel-body">
                                <?php $form = ActiveForm::begin([
                                            'action' => 'save-review',
                                            'id' => 'enterReview-form',
                                            'enableAjaxValidation' => false,
                                            'enableClientValidation' => true,
                                            'validateOnBlur' => false,
                                ]); ?>

                                <?= $form->field($review, 'description')->textarea(['rows' => '4','placeholder' =>Yii::t('app','Write your experience and satisfaction with walker maximum 200 words!')]);  ?>

                                <?= $form->field($review, 'rating')->widget(StarRating::classname(), [
                                'pluginOptions' => ['size'=>'sm','language' => 'fr']
                                ]); ?>

                                <div class="form-group">
                                    <?= Html::submitButton(Yii::t('app', 'Post review'), ['class' => 'btn btn-block btn-success']) ?>
                                </div>
                                <?php ActiveForm::end(); ?>
                        </div>
                </div>
        </div>
</div>
