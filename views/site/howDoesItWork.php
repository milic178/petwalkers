<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 19.5.2017
 * Time: 22:29
 */

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = Yii::t('app','How does it work ');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Displaying modal form for entering review code and rating user -->
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


<!-- Content Row -->
<h1 class="text-white  page-header"><?= Yii::t('app','How does it work ') ?></h1>




<!-- rendering how does it work -->
<?= $this->render('/site/howSitterWidget') ?>




<!-- Becoming sitter -->
<div class="main clearfix"">
    <div class="col-lg-12">
        <h2 class="text-white text-center padding-bottom"><?= Yii::t('app','Becoming sitter') ?></h2>
    </div>
    <div class="col-lg-12">

        <ul id="myTab" class="nav nav-tabs nav-justified">
            <li class="active"><a href="#service-5" data-toggle="tab" id="bold-text"><i class="fa fa-user-plus fa-lg" aria-hidden="true"></i> <?= Yii::t('app','Register') ?></a>
            </li>
            <li class=""><a href="#service-6" data-toggle="tab" id="bold-text"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> <?= Yii::t('app','Update profile') ?></a>
            </li>
            <li class=""><a href="#service-7" data-toggle="tab" id="bold-text"><i class="fa fa-bullhorn fa-lg" aria-hidden="true"></i> <?= Yii::t('app','Publish advert') ?></a>
            </li>
            <li class=""><a href="#service-8" data-toggle="tab" id="bold-text"><i class="fa fa-coffee fa-lg" aria-hidden="true"></i></i> <?= Yii::t('app','Sit back and relax') ?></a>
            </li>
        </ul>

        <div id="bigger-font" class="tab-content">
            <div class="tab-pane fade active in" id="service-5">
                <h4></h4>
                <p class="text-white">

                    <?= Yii::t('app','To become pet sitter you will need to Create an FREE account. Simply click on Register which is located in upper menu. After you enter all data required you will receive an email with confirmation link to complete registration.') ?>

                </p>
                <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'step_5.jpg', [
                    'class'=>'img-responsive img-hover center-block img-rounded',
                    'width'=>'50%',
                    'height'=>'50%',
                    'title'=>Yii::t('app','Register'),
                ]); ?>
            </div>
            <div class="tab-pane fade" id="service-6">
                <h4></h4>
                <p class="text-white">

                    <?= Yii::t('app','After completing registration process your profile will show up. You should enter all the missing data and write something about yourself. It is important to upload a proper profile photo. All information will be publicly displayed so profiles, photos are moderated to maintain trust and respect in the community.')?>

                </p>
                <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'step_6.jpg', [
                    'class'=>'img-responsive img-hover center-block img-rounded',
                    'width'=>'70%',
                    'height'=>'70%',
                    'title'=>Yii::t('app','Update profile'),
                ]); ?>
            </div>
            <div class="tab-pane fade" id="service-7">
                <h4></h4>
                <p class="text-white">

                    <?= Yii::t('app','To create and advert simply click on "Advert" in menu bar after you login. Click on "Create Advert" and popup form will be displayed. After you are done with filing the form press "Create" button and advert will be public. You can edit or delete certain adds from be list shown.')?>

                </p>
                <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'step_7.jpg', [
                    'class'=>'img-responsive img-hover center-block img-rounded',
                    'width'=>'70%',
                    'height'=>'70%',
                    'title'=>Yii::t('app','Publish advert'),
                ]); ?>
            </div>
            <div class="tab-pane fade" id="service-8">
                <h4></h4>
                <p class="text-white">

                    <?= Yii::t('app','You adverts are live instantly when created. Now just sit back and relax while persons contact you throughout the information your provided under your profile.')?>

                </p>
            </div>
        </div>

    </div>
</div>





<!-- Reviewing sitter -->
<div class="main clearfix">
    <div class="col-lg-12">
        <h2 class="text-white text-center padding-bottom"><?= Yii::t('app','Review sitter') ?></h2>
    </div>
    <div class="col-lg-12">

        <ul id="myTab" class="nav nav-tabs nav-justified">
            <li class="active"><a href="#service-9" data-toggle="tab" id="bold-text"><i class="fa fa-plus-square-o fa-lg" aria-hidden="true"></i> <?= Yii::t('app','Obtain code') ?></a>
            </li>
            <li class=""><a href="#service-10" data-toggle="tab" id="bold-text"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> <?= Yii::t('app','Input code') ?></a>
            </li>
            <li class=""><a href="#service-11" data-toggle="tab" id="bold-text"><i class="fa fa-comment fa-lg" aria-hidden="true"></i> <?= Yii::t('app','Write review') ?></a>
            </li>
            <li class=""><a href="#service-12" data-toggle="tab" id="bold-text"><i class="fa fa-bullhorn fa-lg" aria-hidden="true"></i></i> <?= Yii::t('app','Make it public') ?></a>
            </li>
        </ul>

        <div id="bigger-font" class="tab-content">
            <div class="tab-pane fade active in" id="service-9">
                <h4></h4>
                <p class="text-white">

                    <?= Yii::t('app','To obtain a review CODE you will need to contact a certain sitter. CODE is valid for 2 days meaning that is the time you will have to write a review about your experience with sitter.')?>

                </p>
                <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'code.jpg', [
                    'class'=>'img-responsive img-hover center-block img-rounded',
                    'width'=>'50%',
                    'height'=>'50%',
                    'title'=>Yii::t('app','Rate walker'),
                ]); ?>
            </div>
            <div class="tab-pane fade" id="service-10">
                <h4></h4>
                <p class="text-white">

                    <?= Yii::t('app','To use the CODE simply click on "Rate walker" on top menu. After that popup window will be displayed where you simply paste the CODE. This will not be displayed if you are logged into the website.')?>

                </p>
                <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'step_11.jpg', [
                    'class'=>'img-responsive img-hover center-block img-rounded',
                    'width'=>'70%',
                    'height'=>'70%',
                    'title'=>Yii::t('app','Enter code'),
                ]); ?>
            </div>
            <div class="tab-pane fade" id="service-11">
                <h4></h4>

                <p class="text-white">

                    <?= Yii::t('app','If the CODE is valid and accepted you will be able to leave review for certain sitter. Write a hort description about your experience with his service and rate it with stars.')?>

                </p><?=  Html::img(\Yii::$app->params['uploadUrl'] . 'step_12.jpg', [
                    'class'=>'img-responsive img-hover center-block img-rounded',
                    'width'=>'80%',
                    'height'=>'80%',
                    'title'=>Yii::t('app','Post review'),
                ]); ?>
            </div>
            <div class="tab-pane fade" id="service-12">
                <h4></h4>
                <p class="text-white">

                    <?= Yii::t('app','When review is approved it will be shown publicly on sitters profile.')?>

                </p><?=  Html::img(\Yii::$app->params['uploadUrl'] . 'step_13.jpg', [
                    'class'=>'img-responsive img-hover center-block img-rounded',
                    'width'=>'40%',
                    'height'=>'40%',
                    'title'=>Yii::t('app','Review submitted'),
                ]); ?>
            </div>
        </div>

    </div>
</div>


