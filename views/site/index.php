<?php

/* @var $this yii\web\View */

$this->title = 'Petwalkers';
?>

<?php
use app\assets\IndexAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

use app\models\AdvertType;
use app\models\Animal;
use app\models\City;
use yii\helpers\ArrayHelper;


/* @var $this \yii\web\View */
/* @var $content string */
IndexAsset::register($this);
?>
<!-- Modal for entering review code -->
<div>
    <?php
    Modal::begin([
        'header' => '<h3>'.Yii::t('app','Rate walker').'</h3>',
        'id'=>'enter-code',
        'size'=>'modal-sm',
        'clientOptions' => [
            'backdrop' => 'static'
        ]
    ]);
    echo "<div id='modalFormContent'></div>";
    Modal::end();
    ?>
</div>

<div class="header">

<!-- Rendering alert view (displaying growl messages -->
 <?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
    <div class="jumbotron">

        <h1 style="margin-top: 1em;">
            <i class="fa fa-paw fa-lg" aria-hidden="true"></i>
            <?php //\Yii::t('app', 'Welcome');?>
            Petwalkers
        </h1>

        <div class="welcome-page">
            <?= Yii::t('app','Welcome here you can find pet sitting service. Choose a place, type, and price and browse to find a reliable person who will take care of your pets during your absence or incapacity.') ?>
        </div>

    </div>

    <!-- Icons for benefits -->
    <div class="row text-center">
        <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="glyphicon glyphicon-gift fa-stack-1x fa-inverse"></i>
                    </span>
            <h3><?= Yii::t('app',' Free of charge') ?> </h3>
            <p class="text-white">
                <?= Yii::t('app','Web application is completely free, you can use it without paying for anything.') ?>
            </p>
        </div>
        <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="glyphicon glyphicon-thumbs-up fa-stack-1x fa-inverse"></i>
                    </span>
            <h3 class="service-heading"><?= Yii::t('app',' Easy to Use') ?></h3>
            <p class="text-white">
                <?= Yii::t('app','Petwalkers has been developed for users of all ages. Powerful application with user friendly interface.') ?>
            </p>
        </div>

        <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-globe fa-stack-1x fa-inverse"></i>
                    </span>
            <h3 class="service-heading"><?= Yii::t('app','Multilingual') ?> </h3>
            <p class="text-white">
                <?= Yii::t('app','We are available in 3 languages. Currently we support Slovenian, English and French languages.') ?>
            </p>
        </div>


        <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-comments-o fa-stack-1x fa-inverse"></i>
                    </span>
            <h3 class="service-heading"><?= Yii::t('app',' Instant contact with sitter') ?> </h3>
            <p class="text-white">
                <?= Yii::t('app','Browse trough offers and select a sitter. No need for registration to find a perfect sitter for your pet!') ?>
            </p>
        </div>


    </div>

</div>


    <!-- Search form with select parameters for finding sitters  -->
    <div class="content-container " id="index-form">
        <div class="main clearfix">
            <?php $form = ActiveForm::begin([
                'id' => 'nl-form',
                'action' => ['advert/list-adverts'],
                'method' => 'get',
                'options' => ['class' => 'nl-form','enctype'=>'multipart/form-data'],
                'fieldConfig' => [
                      'labelOptions' => ['class' => 'col-lg-3 control-label'],
                ],
                'enableAjaxValidation' => true,
                'enableClientValidation' => false,
                'validateOnBlur' => false,
            ]); ?>
             <?= Yii::t('app','I feel like finding pet sitter for') ?>
                <?=
                    Html::activeDropDownList($model, 'id_type',ArrayHelper::map(AdvertType::find()->all(),'id_type','name'),['prompt'=>Yii::t('app','any type')]);
                ?>
            <br />
            <?= Yii::t('app','in') ?>

            <?=
            Html::activeDropDownList($model,'id_city',
                ArrayHelper::map(City::find()->asArray()->all(), 'id_city', 'name'),
                    ['prompt'=>Yii::t('app','any city')]
                );
            ?>

            <?= Yii::t('app','for my') ?>
                <?=
                    Html::activeDropDownList($model, 'id_animal',ArrayHelper::map(Animal::find()->all(),'id_animal','species'),
                        ['prompt'=>Yii::t('app','any animal'),
                            'class' => 'nl-dd-checked']);
                ?>
            <?= Yii::t('app','from') ?>
                <?php
                 echo Html::activeDropDownList($model, 'price',
                     ['10'=>'0€ - 10€', '20'=>'10€ - 20€', '50'=>'20€ - 50€'],
                     ['prompt'=>Yii::t('app','any price')]);
                ?>
            <?= Yii::t('app','per hour') ?>
                <div class="nl-submit-wrap">
                    <?= Html::submitButton(Yii::t('app', 'Find sitter'), ['class' => 'nl-submit']) ?>
                </div>
                <div class="nl-overlay"></div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>





<!-- Page Content -->
<div class="content-container ">




    <!-- rendering sitter how does it work -->
    <?= $this->render('/site/howSitterWidget') ?>

    <!-- Call to Action Section -->
      <div class="col-md-12">
        <div class="well">
            <div class="row" >
                <div class="col-md-8">
                    <p class="how-main"><?= Yii::t('app','For finding  out more about how to become Sitter or review a specific sitter, please refer to') ?></p>
                </div>
                <div class="col-md-4" >
                    <a class="btn btn-lg btn-default btn-block" href="/site/how"><?= Yii::t('app','How does it work?') ?></a>
                </div>
            </div>
        </div>
    </div>


    <!-- Testimonials -->
        <div class="col-lg-12">
            <h2 class="text-center padding-bottom"><?= Yii::t('app','User testimonials') ?></h2>
        </div>



    <div class="row">
        <div class="col-sm-4">
            <?= Html::img(\Yii::$app->params['uploadUrl'].'gordana.jpg',[
                'class'=>'center-block img-circle img-responsive',
                'width'=>'150px',
                'height'=>'150px',
            ]);?>
            <h4 class="text-center">
                Gordana
            </h4>
            <p class="text-white text-center">"Lead Developer"</p>
        </div>
        <div class="col-sm-4">
            <div class="panel-heading text-center">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-support fa-stack-1x fa-inverse"></i>
                        </span>
            </div>
            <h4 class="text-center">
                Jaka kaka
            </h4>
            <p class="text-white text-center">"Lead Developer"</p>
        </div>
        <div class="col-sm-4">
            <?= Html::img(\Yii::$app->params['uploadUrl'].'aneta.jpg',[
                'class'=>'center-block img-circle img-responsive',
                'width'=>'150px',
                'height'=>'150px',
            ]);?>
            <h4 class="text-center">
                Aneta
            </h4>
            <p class="text-white text-center">"Lead Developer"</p>
        </div>
    </div>



    <script src="js/nlform.js"></script>
    <script>
        var nlform = new NLForm( document.getElementById( 'nl-form' ) );
    </script>

