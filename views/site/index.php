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


<!-- Page Content -->
<div class="container">

    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
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
            <div class="panel panel-warning">
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
            <div class="panel panel-success">
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


    <!-- How does it work -->
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


    <!-- Service Tabs -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header"><?= Yii::t('app','How does it work?') ?></h2>
        </div>
        <div class="col-lg-12">

            <ul id="myTab" class="nav nav-tabs nav-justified">
                <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-hand-o-right" aria-hidden="true"></i> <?= Yii::t('app','Step One') ?></a>
                </li>
                <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-car"></i> <?= Yii::t('app','Step Two') ?></a>
                </li>
                <li class=""><a href="#service-three" data-toggle="tab"><i class="fa fa-support"></i> <?= Yii::t('app','Step Three') ?></a>
                </li>
                <li class=""><a href="#service-four" data-toggle="tab"><i class="fa fa-database"></i> <?= Yii::t('app','Step Four') ?></a>
                </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="service-one">
                    <h4>Service One</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                </div>
                <div class="tab-pane fade" id="service-two">
                    <h4>Service Two</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                </div>
                <div class="tab-pane fade" id="service-three">
                    <h4>Service Three</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                </div>
                <div class="tab-pane fade" id="service-four">
                    <h4>Service Four</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                </div>
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


    <script src="js/nlform.js"></script>
    <script>
        var nlform = new NLForm( document.getElementById( 'nl-form' ) );
    </script>

