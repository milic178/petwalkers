<?php

use yii\helpers\Html;
use app\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $model app\models\Advert */
/* @var $model app\models\Profile */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'List of adverts'), 'url' => ['list-adverts']];
$this->params['breadcrumbs'][] = $this->title;

AppAsset::register($this);
?>


<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="advert-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title ">
                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                <?=Yii::t('app','Basic info') ?>
            </h3>
        </div>
        <div class="panel-body">

            <div class="container-fluid">
<!-- First row -->
                <div class="row">
<!-- First container -->
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title ">
                                    <span class="glyphicon glyphicon-euro" aria-hidden="true"></span>
                                    <?= $model->getAttributeLabel('price') ?>
                                </h3>
                            </div>
                            <div class="panel-body text-center">
                                <?= $model->price ?>
                            </div>
                        </div>
                    </div>
<!-- Second container -->
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title ">
                                    <span class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                    <?= $model->getAttributeLabel('id_type') ?>
                                </h3>
                            </div>
                            <div class="panel-body text-center">
                                <?= $model->idType->name ?>
                            </div>
                        </div>
                    </div>
<!-- Third container -->
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title ">
                                    <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                                    <?= $model->getAttributeLabel('id_city') ?>
                                </h3>
                            </div>
                            <div class="panel-body text-center">
                                <?= $model->idCity->name ?>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Second row -->
                <div class="row">
 <!-- first container -->
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title ">
                                    <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>
                                    <?= $model->getAttributeLabel('id_animal') ?>
                                </h3>
                            </div>
                            <div class="panel-body text-center">
                                <?= $model->idAnimal->species ?>
                            </div>
                        </div>
                    </div>
<!-- second container -->
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title ">
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                    <?= $model->getAttributeLabel('created') ?>
                                </h3>
                            </div>
                            <div class="panel-body text-center">
                                <?= $model->created ?>
                            </div>
                        </div>
                    </div>
<!-- third container -->
                    <div class="col-sm-4">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title ">
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                    <?= $model->getAttributeLabel('valid_until') ?>
                                </h3>
                            </div>
                            <div class="panel-body text-center">
                                <?= $model->valid_until ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Displaying add description block-->

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title ">
                <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                <?= $model->getAttributeLabel('description') ?>
            </h3>
        </div>
        <div class="panel-body">
            <?= $model->description ?>
        </div>
    </div>

<!-- Displaying user profile popup -->

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
                        <div class="alert alert-info"><?= Yii::t('app','More about walker')?></div>
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

                    <span class="label label-info"><?=Yii::t('app','User activity')?></span>
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


<!-- Displaying user reviews -->
    <h2>User reviews</h2>








<p class="text-center">
    <?php
    if (!Yii::$app->user->isGuest):
        print (Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_advert], ['class' => 'btn btn-primary']));
        print (Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_advert], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]));
    endif;
    ?>
</p>