<?php

/* @var $this yii\web\View */

$this->title = 'Petwalkers';
?>

<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

use app\models\AdvertType;
use app\models\Region;
use app\models\Animal;
use app\models\Advert;
use yii\helpers\ArrayHelper;


/* @var $this \yii\web\View */
/* @var $content string */




$this->registerJsFile('js/nlform.js');
$this->registerJsFile('js/modernizr.custom.js');
?>


<div class="site-index">
    <?= \lajax\languagepicker\widgets\LanguagePicker::widget([
        'skin' => \lajax\languagepicker\widgets\LanguagePicker::SKIN_DROPDOWN,
        'size' => \lajax\languagepicker\widgets\LanguagePicker::SIZE_LARGE
    ]); ?>

    <div class="jumbotron">
        <h1><?= \Yii::t('app', 'Welcome');?></h1>

        <h3 style="text-align: center"><?// Yii::t('app','Here you can find a sitter for your pet o become one!');?></h3>
    </div>
<div class="col-md-12">
    <form id="nl-form" class="nl-form">
        I feel like finding pet sitter for
        <?=
        Html::activeDropDownList($model, 'id_type',ArrayHelper::map(AdvertType::find()->all(),'id_type','name'),['prompt'=>Yii::t('app','any type')]);
        ?>
        <br />in a
        <?=
        Html::activeDropDownList($model, 'id_type',ArrayHelper::map(Region::find()->all(),'id_region','name'),['prompt'=>Yii::t('app','any region')]);
        ?>
        for my
        <?=
        Html::activeDropDownList($model, 'id_type',ArrayHelper::map(Animal::find()->all(),'id_animal','species'),['prompt'=>Yii::t('app','any animal')]);
        ?>
        at
        <?=
        Html::activeDropDownList($model, 'id_type',ArrayHelper::map(Advert::find()->all(),'id_advert','price'),['prompt'=>Yii::t('app','any price')]);
        ?>
        <div class="nl-submit-wrap">
            <button class="nl-submit" type="submit">Find sitter</button>
        </div>
        <div class="nl-overlay"></div>
    </form>
</div>
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



    <?php ActiveForm::end(); ?>
    </div>
</div>
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
    <div class="col-md-12 text-center">

        <?= Html::a(Yii::t('app','Find sitter'),
            ['advert/list-adverts'],
            [
                'class'=>'btn btn-success btn-lg',
                'id'=>'find-fitter'
            ]
        )
        ?>
        <p>
            <?= Html::button(Yii::t('app', 'Become walker'), ['value' => Url::to(['advert/create']),
                'class' => 'showModalButton btn btn-success',
                'id'=>'modalCreateAdvertButton']); ?>


        </p>
        <?php
        Modal::begin([
            'id'=>'createAdvert',
            'size'=>'modal-md'
        ]);
        echo "<div id='modalContentCreate'></div>";
        Modal::end();
        ?>
    </div>

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



</body>
