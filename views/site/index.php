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

<div class="site-index">

<!-- Rendering alert view (displaying growl messages -->
 <?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
    <div class="jumbotron">

        <h1>
            <i class="fa fa-paw fa-lg" aria-hidden="true"></i>
            <?php //\Yii::t('app', 'Welcome');?>
            Petwalkers
        </h1>

        <div class="panel welcome-page">
            <?= Yii::t('app','Welcome here you can find pet sitting service. Choose a place, type, and price and browse to find a reliable person who will take care of your pets during your absence or incapacity.') ?>
        </div>

    </div>

    <div class="container demo-1" id="index-form">
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

    <!-- making space -->
    <div class="col-xs-12" style="height:50px;"></div>
    <!-- /.row -->

<!-- Page Content -->
<div class="container">

    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4><i class="glyphicon glyphicon-gift fa-lg"></i><?= Yii::t('app',' Free of charge') ?> </h4>

                </div>
                <div class="panel-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                    <a href="#" class="btn btn-default">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4><i class="glyphicon glyphicon-thumbs-up fa-lg"></i><?= Yii::t('app',' Easy to Use') ?> </h4>
                </div>
                <div class="panel-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4><i class="fa fa-comments-o fa-lg" aria-hidden="true"></i><?= Yii::t('app',' Instant contact with sitter') ?></h4>
                </div>
                <div class="panel-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- making space -->
    <div class="col-xs-12" style="height:50px;"></div>
    <!-- /.row -->

    <!-- rendering sitter how does it work -->
    <?= $this->render('/site/howSitterWidget') ?>

    <!-- Call to Action Section -->
    <hr>
    <div class="well">
        <div class="row" >
            <div class="col-md-8">
                <p><?= Yii::t('app','For finding  out more about how to become Sitter or review a specific sitter, please refer to') ?></p>
            </div>
            <div class="col-md-4" >
                <a class="btn btn-lg btn-default btn-block" href="/site/how"><?= Yii::t('app','How does it work?') ?></a>
            </div>
        </div>
    </div>

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





</div>


    <script src="js/nlform.js"></script>
    <script>
        var nlform = new NLForm( document.getElementById( 'nl-form' ) );
    </script>

