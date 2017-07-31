<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 20.7.2017
 * Time: 11:10
 */

use yii\helpers\Html;


?>

<!-- How does it work? -->
    <div class="row ">
        <div class="col-lg-12 ">
            <h2 class="text-white text-center padding-bottom">1. <?= Yii::t('app','Finding a sitter') ?></h2>
</div>
<div class="col-lg-12" id="lighter-link-color">

    <ul id="myTab" class="nav nav-tabs nav-justified">
        <li class="active"><a href="#service-one" data-toggle="tab" id="bold-text"><i class="fa fa-hand-o-right fa-lg" aria-hidden="true"></i> <?= Yii::t('app','Select parameters') ?></a>
        </li>
        <li class=""><a href="#service-two" data-toggle="tab" id="bold-text"><i class="fa fa-list-ol fa-lg" aria-hidden="true"></i> <?= Yii::t('app','See results') ?></a>
        </li>
        <li class=""><a href="#service-three" data-toggle="tab" id="bold-text"><i class="fa fa-info fa-lg" aria-hidden="true"></i> <?= Yii::t('app','Inspect advert') ?></a>
        </li>
        <li class=""><a href="#service-four" data-toggle="tab" id="bold-text"><i class="fa fa-phone fa-lg" aria-hidden="true"></i> <?= Yii::t('app','Contact walker') ?></a>
        </li>
    </ul>

    <div  class="tab-content" id="bigger-font">
        <div class="tab-pane fade active in" id="service-one">
            <h4></h4>
            <p class="text-white" >

                    <?= Yii::t('app','To find a sitter simply click on underlined yellow words which represent search parameters. A popup window will appear with different options. Simply chose from type, animal, city and price. When done click on "Find Sitter" button. Results will be displayed based on your search criteria. None of listed parameters are required. Currently our services are available only in certain cities.') ?>

            </p>
            <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'step_one_cropped.jpg', [
                'class'=>'img-responsive img-hover center-block img-rounded',
                'width'=>'90%',
                'height'=>'90%',
                'title'=>Yii::t('app','Select parameters'),
            ]); ?>
        </div>
        <div class="tab-pane fade" id="service-two">
            <h4></h4>
            <p class="text-white">

                <?= Yii::t('app','A list of all available sitters with your criteria will be displayed. In the first row of table there are some search parameters which you can always modify. To view a specific advert just click anywhere in that row or on the right side where you will se and EYE icon.') ?>

            </p>


            <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'step_two_cropped.jpg', [
                'class'=>'img-responsive img-hover center-block img-rounded',
                'width'=>'80%',
                'height'=>'80%',
                'title'=>Yii::t('app','Browse trough results'),
            ]); ?>
        </div>
        <div class="tab-pane fade" id="service-three">
            <h4></h4>
            <p class="text-white">

                <?= Yii::t('app','Advert information is displayed. First we see the sitters profile picture. If we click on it a popup will be show displaying sitters user profile. Name, last name, age, last login time, description and other information will be shown. Below user profile picture we can see shot advert Description. After that some Basic Info about advert is displayed. At end of page we can see  user reviews, from other owners who have contacted this sitter. To get user contact information simply click "Contact user" button.') ?>

            </p>
            <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'step_three_cropped.jpg', [
                'class'=>'img-responsive img-hover center-block img-rounded',
                'width'=>'70%',
                'height'=>'70%',
                'title'=>Yii::t('app','Review advert'),
            ]); ?>
        </div>
        <div class="tab-pane fade" id="service-four">
            <h4></h4>

            <p class="text-white">

                <?= Yii::t('app','After you have entered your Name, Last name and Pet\'s name you will be given a review CODE and sitter contact information will be displayed below. CODE is alid for 2 days after it has been obtained. Use the CODE to leave a review for sitter after he has taken care of your pet in order to make other people know how satisfied you were.') ?>

            </p>
            <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'step_four_cropped.jpg', [
                'class'=>'img-responsive img-hover center-block img-rounded',
                'width'=>'90%',
                'height'=>'90%',
                'title'=>Yii::t('app','Contact walker'),
            ]); ?>
        </div>
    </div>

</div>
</div>
