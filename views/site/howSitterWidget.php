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
            <h2 class="text-white text-center padding-bottom"><?= Yii::t('app','Finding a sitter') ?></h2>
</div>
<div class="col-lg-12">

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

    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="service-one">
            <h4></h4>
            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
            <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'step_one_cropped.jpg', [
                'class'=>'img-responsive img-hover center-block img-rounded',
                'width'=>'90%',
                'height'=>'90%',
                'title'=>Yii::t('app','Select parameters'),
            ]); ?>
        </div>
        <div class="tab-pane fade" id="service-two">
            <h4></h4>
            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
            <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'step_two_cropped.jpg', [
                'class'=>'img-responsive img-hover center-block img-rounded',
                'width'=>'80%',
                'height'=>'80%',
                'title'=>Yii::t('app','Browse trough results'),
            ]); ?>
        </div>
        <div class="tab-pane fade" id="service-three">
            <h4></h4>
            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
            <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'step_three_cropped.jpg', [
                'class'=>'img-responsive img-hover center-block img-rounded',
                'width'=>'70%',
                'height'=>'70%',
                'title'=>Yii::t('app','Review advert'),
            ]); ?>
        </div>
        <div class="tab-pane fade" id="service-four">
            <h4></h4>
            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
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
