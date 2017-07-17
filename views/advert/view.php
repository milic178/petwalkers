<?php

use kartik\social\FacebookPlugin;
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\dialog\Dialog;
use app\models\Reviews;

/* @var $this yii\web\View */
/* @var $model app\models\Advert */
/* @var $model app\models\Profile */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'List of adverts'), 'url' => ['list-adverts']];
$this->params['breadcrumbs'][] = $this->title;

AppAsset::register($this);
?>

<!-- meta tags for facebook share -->
<?php
Yii::$app->params['og_title']['content'] = $model->title;
Yii::$app->params['og_description']['content'] = $model->description;
Yii::$app->params['og_url']['content'] = Yii::$app->request->getUrl();
Yii::$app->params['og_image']['content'] = 'image.jpg';
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

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<!-- printing dialog widget SUCCESS and filling with message -->
<?=
Dialog::widget([
    'libName' => 'krajeeDialogSuccess',
    'options' => [
        'type' => Dialog::TYPE_SUCCESS,
        'title' => Yii::t('app', 'Success!')
    ],
]);
?>


<!-- printing dialog widget ERROR and filling with message -->
<?=
Dialog::widget([
    'libName' => 'krajeeDialogError', // a custom lib name
    'options' => [
        'type' => Dialog::TYPE_DANGER,
        'title' => Yii::t('app', 'Failed!')
    ],
]);
?>


<div>
    <h1 class="text-white  page-header"><?= $model->title; ?></h1>

<!-- Displaying user profile popup -->

    <div class="text-white">
        <div class="text-center">
            <a href="#aboutModal" data-toggle="modal" data-target="#myModal">
                <?=  Html::img($profile->getImageUrl(), [
                    'class'=>'img-rounded',
                    'width'=>'100px',
                    'height'=>'100px',
                    'title'=>$profile->first_name,
                ]); ?>
            </a>
            <h3 class="text-white"><?=$profile->first_name;?> <?=$profile->last_name ?></h3>
            <em class="text-white">    <?= Yii::t('app','Click on my face to see my profile')?> </em>
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
                                'width'=>'100px',
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
                                <?php if(!$profile->user->last_login_at==null):
                                            echo Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$profile->user->last_login_at]);
                                        else:
                                        echo Yii::t('app','Current user did not login to the application!');
                                        endif;
                                ?>
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
</div>
    <br>

<!-- Displaying add description block-->

    <div class="panel panel-info">
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

<!-- Displaying basic info primary box -->
<div class="panel panel-info">
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
                                   <i class="fa fa-sitemap" aria-hidden="true"></i>
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
                                <span>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </span>
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
                                <span>
                                    <i class="fa fa-paw" aria-hidden="true"></i>
                                </span>
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
                            <?php
                            $date = $model->created;
                            $dt = new DateTime($date);
                            echo $dt->format('d-m-Y');
                            ?>
                        </div>
                    </div>
                </div>
<!-- third container -->
                <div class="col-sm-4">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title ">
                                <i class="fa fa-calendar-times-o" aria-hidden="true"></i>
                                <?= $model->getAttributeLabel('valid_until') ?>
                            </h3>
                        </div>
                        <div class="panel-body text-center">
                            <?php
                                $date = $model->valid_until;
                                $dt = new DateTime($date);
                                echo $dt->format('d-m-Y');
                             ?>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>


<!--Displaying user contact email / phone -->
    <div>

        <div id="userContactInfo" style="display:none;" >
            <div class="panel-body">
                    <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                    <?= $profile->getAttributeLabel('telephone') ?>
                                </h3>
                            </div>
                            <div class="panel-body text-center">
                                <?= $profile->telephone ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <?= Yii::t('app','Email') ?>
                                </h3>
                            </div>
                            <div class="panel-body text-center">
                                <?= $profile->user->email ?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>


<!-- Button for contacting walker -->
    <div class="row">
        <div class="col-md-6 col-xs-6">
            <div class="text-right">
            <?= Html::button(Yii::t('app', 'Contact user'), ['value' => Url::to(['review/request-code','id_profile'=>$profile->user_id]),
                'class' => 'btn btn-success',
                'id'=>'contact-walker']); ?>
            </div>
        </div>
        <div class="col-md-6 col-xs-6">
            <div class="text-left">
                <!-- facebook share meta tag ---->
                <?= FacebookPlugin::widget(['type'=>FacebookPlugin::SHARE,
                    'settings' =>
                    [
                        'size'=>'large',
                        'layout'=>'button_count',
                        'mobile_iframe'=>'false',
                    ],
                    'appId'=>'875927969242038'

                ]); ?>
            </div>
        </div>
    </div>

<!-- Displaying user reviews -->
<h2 class="text-white"><?= Yii::t('app','User reviews:') ?></h2>
<?= $this->render('/review/showReviews', ['model' => Reviews::listAllApprovedReviews($profile->user_id)]) ?>



<!-- Buttons for updating and deleting add info -->
<p class="text-center" style="padding-top: 5%">
    <?php
    if (!Yii::$app->user->isGuest):
        print (Html::a('<i class="fa fa-pencil" aria-hidden="true"></i>'.Yii::t('app', ' Update'), ['update', 'id' => $model->id_advert], ['class' => 'btn btn-primary']));
        print (Html::a(' <i class="fa fa-trash-o"></i>'.Yii::t('app', ' Delete'), ['delete', 'id' => $model->id_advert], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]));
    endif;
    ?>
</p>

</div>


<!-- Modal form for requestig review code -->
<div>
    <?php
    Modal::begin([
        'header' => '<h3>'.Yii::t('app','Request walker contact').'</h3>',
        'id'=>'request-code',
        'size'=>'modal-sm',
    ]);
    echo "<div id='modalRequestCode'></div>";
    Modal::end();
    ?>
</div>







<?php
// js code for submiting with ajax and rendering new modal with responce showing code and user contact info

$js = <<< JS
$('body').on('beforeSubmit','#request-code-form', function () {
     var form = $(this);
     // return false if form still have some validation errors
     if (form.find('.has-error').length) {
          return false;
     }
     // submit form
     $.ajax({
          url: form.attr('action'),
          type: 'post',
          data: form.serialize(),
          success: function (response) {
              $('#request-code').modal('hide');
              console.log(response)
              krajeeDialogSuccess.alert(response.message+response.code)
              $("#userContactInfo").show();
          
          },
          error: function (response, status) {
              $('#request-code').modal('hide');
              console.log(response)
              krajeeDialogError.alert(response.responseText)
             // document.getElementById("userContactInfo").style.display = 'none';
              $("#userContactInfo").hide();
          }
     });
     return false;
});
JS;
$this->registerJs($js);
?>
