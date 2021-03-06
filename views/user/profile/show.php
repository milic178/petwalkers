<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */

$this->title = empty($profile->name) ? Html::encode($profile->user->username) : Html::encode($profile->name);
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <div class="text-center">
        <a href="#aboutModal" data-toggle="modal" data-target="#myModal">
            <?=  Html::img($profile->getImageUrl(), [
                'class'=>'img-rounded',
                'width'=>'110px',
                'height'=>'100px',
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
                        <div class="alert alert-info">
                            <?= Yii::t('app','More about walker')?>
                        </div>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <?=  Html::img($profile->getImageUrl(), [
                            'class'=>'img-rounded ',
                            'width'=>'110px',
                            'height'=>'100px',
                            'title'=>$profile->first_name,
                        ]); ?>
                        <h3><?=$profile->first_name;?> <?=$profile->last_name ?></h3>
                        <?= Yii::t('app','Age')?>:<?=$profile->age; ?>
                    </div>
                    <hr>

                    <span class="label label-info">
                        <?=Yii::t('app','User activity')?>
                    </span>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <strong><?= Yii::t('user', 'Registration time') ?>:</strong>
                            <?= Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$profile->user->created_at]) ?>
                        </div>
                        <div class="col-md-12">
                            <strong><?= Yii::t('user', 'Last seen') ?>:</strong>
                            <?= Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$profile->user->last_login_at]) ?>
                        </div>
                    </div>

                    <hr>
                    <span class="label label-info"><?=Yii::t('app','About me')?></span>
                    <?php if (!empty($profile->about_me)): ?>
                        <p><?= $profile->about_me?></p>
                    <?php endif; ?>

                    <?php if (!empty($profile->my_animals)): ?>
                        <hr>
                        <span class="label label-info"><?=Yii::t('app','My pets')?></span>
                        <div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <?= Html::img(\Yii::$app->params['uploadUrl'].'dog.png',[
                                        'class'=>'center-block'
                                    ]);?>
                                </div>
                                <div class="col-sm-4">
                                    <?= Html::img(\Yii::$app->params['uploadUrl'].'turtle.png',[
                                        'class'=>'center-block'
                                    ]);?>
                                </div>
                                <div class="col-sm-4">
                                    <?= Html::img(\Yii::$app->params['uploadUrl'].'cat.png',[
                                        'class'=>'center-block'
                                    ]);?>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <p>
                                    <?=$profile->first_name;?>
                                    <?=Yii::t('app','is a proud owner of');?>
                                    <?=$profile->my_animals;?>
                                    <?=Yii::t('app','pets');?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <br>
                    <?php if (!empty($profile->social_link)): ?>
                        <hr>
                        <div class=" text-center">
                            <br>
                            <p><?= Html::a(Yii::t('app','Social Media Profile'),
                                    $profile->social_link,
                                    [
                                        'class'=>'btn btn-success btn-sm' ,
                                        'target'=>'_blank',
                                    ]
                                )
                                ?>
                            </p>
                        </div>
                    <?php endif; ?>
                    <br>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t('app','Close');?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>