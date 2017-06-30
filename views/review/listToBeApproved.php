<?php
/* @var $this yii\web\View */

use  yii\grid\GridView;
use yii\helpers\Html;
use kartik\dialog\Dialog;
use yii\widgets\Pjax;

?>

<h1><?= Yii::t('app','List of reviews waiting for confirmation') ?></h1>

<p class="bg-info text-white">
    <?= Yii::t('app','Below is a list of all reviews waiting to be approved for your profile, simply click on review, if you recognize the reviewer confirm else decline it.') ?>
</p>


<?= //displaying alret messages
$this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
<?php

// displaing confirm dialog
echo Dialog::widget(); ?>

<?php Pjax::begin(['id' => 'pjax-listReviews']); ?>
<?=
    //displaying grid view with data
    GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{summary}\n{items}\n<div class='text-center'>{pager}</div>",
        'columns' => [
            [
                'attribute' =>   'name',
                'headerOptions' => ['style' => 'width:5%'],
            ],
            [
                'attribute' =>   'lastname',
                'headerOptions' => ['style' => 'width:5%'],
            ],
            [
                'attribute' =>   'petname',
                'headerOptions' => ['style' => 'width:5%'],
            ],
            [
                'attribute' =>   'created',
                'value'=> function ($model){
                    $date = $model->created;
                    $dt = new DateTime($date);
                    return $dt->format('d-m-Y');
                },
                'headerOptions' => ['style' => 'width:5%'],
            ],
            [
                'attribute' =>   'valid_until',
                'value'=> function ($model){
                    $date = $model->valid_until;
                    $dt = new DateTime($date);
                    return $dt->format('d-m-Y');
                },
                'headerOptions' => ['style' => 'width:5%'],
            ],

            ['class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'width:10%'],
                'header' => Yii::t('user', 'Actions'),
                'template' => '{approve} {decline} {testAccept}, {testDecline}',
                'buttons' => [
                    'approve' => function ($url, $model, $key) {
                        return Html::a(Yii::t('app','Approve'), ['review/review-accept'],
                            [
                                'class' => 'test btn btn-success btn-xs',
                                'data' => [
                                    'method' => 'POST',
                                    'params' => ['id_review' => $model->id_review],
                                ],
                            ]);
                    },
                    'decline' => function ($url, $model, $key) {
                        return Html::a(Yii::t('app','Decline'), ['review/review-decline'],
                            [
                                'class' => 'btn btn-danger btn-xs',
                                'data' => [
                                    'method' => 'POST',
                                    'params' => ['id_review' => $model->id_review]
                                ]
                            ]);
                    },
                    'testAccept' => function ($url, $model, $key) {
                        return Html::a('Your Link name', false, [
                            'title' => Yii::t('yii', 'Close'),
                            'onclick'=>"
                                 $.ajax({
                                type     :'POST',
                                data : {id_review : $model->id_review},
                                url  : '/review/review-accept',
                                    success  : function(response) {
                                       krajeeDialog.alert(response,function(result) {     
                                         });
                                    }
                                });"
                            ]
                        );
                    },
                    //Code for sending ajax request, success answer we get 7
                    //dialog box with message (translatable) and refresh GridView with Ajax
                    'testDecline' => function ($url, $model, $key) {
                        return Html::a('Test decine', false, [
                                'title' => Yii::t('yii', 'Close'),
                                'class' => 'btn btn-info btn-xs',
                                'onclick'=>"
                                 $.ajax({
                                type     :'POST',
                                data : {id_review : $model->id_review},
                                url  : '/review/review-decline',
                                    success  : function(response) { 
                                       krajeeDialog.alert(response,function(result) {  
                                         yourFunction();
                                         });
                                    },
                                     complete: function (data) {
                                        $.pjax({container: '#pjax-listReviews'}) 
                                     }
                                });"
                            ]
                        );
                    },
                ],
            ],
        ],
    ]);

    ?>

<?php
$this->registerJs( <<< EOT_JS_CODE

        

EOT_JS_CODE
);
?>
<?php Pjax::end(); ?>