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


<div class="site-index">


    <div class="jumbotron">

        <h1>
            <i class="fa fa-paw fa-lg" aria-hidden="true"></i>
            <?= \Yii::t('app', 'Welcome');?>
        </h1>
    </div>
    <div class="container demo-1">
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
    <!-- /container -->
<body>
<!-- Page Content -->
<div class="container">

    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="glyphicon glyphicon-ok"></i> Bootstrap v3.3.7</h4>
                </div>
                <div class="panel-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                    <a href="#" class="btn btn-default">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="glyphicon glyphicon-gift"></i> Free &amp; Open Source</h4>
                </div>
                <div class="panel-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                    <a href="#" class="btn btn-default">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="glyphicon glyphicon-thumbs-up"></i> Easy to Use</h4>
                </div>
                <div class="panel-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                    <a href="#" class="btn btn-default">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->


    <!-- Portfolio Section -->
    <div class="row">
        <div class="col-lg-12">
                <h2 class="page-header">How does it work</h2>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="#">
                <?= Html::img(\Yii::$app->params['uploadUrl'].'700_450.jpg',[
                    'alt'=>'some',
                    'class'=>'img-responsive img-portfolio img-hover'
                ]);?>
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <?= Html::img(\Yii::$app->params['uploadUrl'].'700_450.jpg',[
                'alt'=>'some',
                'class'=>'img-responsive img-portfolio img-hover'
            ]);?>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <?= Html::img(\Yii::$app->params['uploadUrl'].'700_450.jpg',[
                    'alt'=>'some',
                    'class'=>'img-responsive img-portfolio img-hover'
                ]);?>
            </a>
        </div>
    </div>
    <!-- /.row -->

    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Benefints of finding your pet walker</h2>
        </div>
        <div class="col-md-6">
            <p>The Modern Business template by Start Bootstrap includes:</p>
            <ul>
                <li><strong>Bootstrap v3.3.7</strong>
                </li>
                <li>jQuery v1.11.1</li>
                <li>Font Awesome v4.2.0</li>
                <li>Working PHP contact form with validation</li>
                <li>Unstyled page elements for easy customization</li>
                <li>17 HTML pages</li>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
        </div>
        <div class="col-md-6">
            <img class="img-responsive" src="http://placehold.it/700x450" alt="">
        </div>
    </div>
    <!-- /.row -->
    <hr>
    <!-- Call to Action Section -->
    <div class="well">
        <div class="row">
            <div class="col-md-8">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-default btn-block" href="#">Call to Action</a>
            </div>
        </div>
    </div>
    <hr>
</div>
</body>

    <script src="js/nlform.js"></script>
    <script>
        var nlform = new NLForm( document.getElementById( 'nl-form' ) );
    </script>

    