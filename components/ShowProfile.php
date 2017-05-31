<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 31.5.2017
 * Time: 20:49
 *
 * Widget for showing popup and displaying user info
 */

namespace  app\components;

use  yii\base\Widget;
use  yii\helpers\Html;
use app\models\Profile;

?>

<div class="container">
    <div class="span3 well">
            <a href="#aboutModal" data-toggle="modal" data-target="#myModal">
                <?=  Html::img($profile->getImageUrl(), [
    'class'=>'img-circle',
    'width'=>'120',
    'height'=>'120',
    'title'=>$profile->first_name,
]); ?>
</a>
<h3><?=$profile->first_name;?> <?=$profile->last_name ?></h3>
<em>    <?= Yii::t('app','Click on my face for more')?> </em>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">
                    <?= Yii::t('app','More about')?>
                </h4>
            </div>
            <div class="modal-body">
                <center>
                    <?=  Html::img($profile->getImageUrl(), [
                        'class'=>'img-circle',
                        'width'=>'120',
                        'height'=>'120',
                        'title'=>$profile->first_name,
                    ]); ?>
                    <h3><?=$profile->first_name;?> <?=$profile->last_name ?></h3>
                    <span><strong>Skills: </strong></span>
                    <span class="label label-warning">HTML5/CSS</span>
                    <span class="label label-info">Adobe CS 5.5</span>
                    <span class="label label-info">Microsoft Office</span>
                    <span class="label label-success">Windows XP, Vista, 7</span>
                </center>
                <hr>
                <p class="text-left glyphicon glyphicon-info-sign"><strong> Bio: </strong><br>
                    <?php if (!empty($profile->about_me)): ?>
                <p><?= Html::encode($profile->about_me) ?></p>
                <?php endif; ?>
                <br>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t('app','Close');?></button>
                </center>
            </div>
        </div>
    </div>
</div>
</div>

