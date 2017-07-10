<?php
/* @var $this yii\web\View */

use  yii\grid\GridView;
use yii\helpers\Html;
use kartik\dialog\Dialog;
use yii\widgets\Pjax;
use app\models\Reviews;

?>
<div>
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
                'headerOptions' => ['style' => 'width:5%'],
                'header' => Yii::t('user', 'Actions'),
                'template' => '{approve} {decline}',
                'buttons' => [
                    'approve' => function ($url, $model, $key) {
                        return Html::a(Yii::t('app','Approve'), ['review/review-accept'],
                            [
                                'class' => 'test btn btn-success btn-xs',
                                'data' => [
                                    'method' => 'POST',
                                    'params' => ['id_review' => $model->id_review],
                                ]
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
                ],
            ],
        ],
    ]);

    ?>
<?php Pjax::end(); ?>
<div style="padding-top: 5%">
    <h2><?= Yii::t('app','My reviews:') ?></h2>
    <?= $this->render('/review/showReviews', ['model' => Reviews::listAllApprovedReviews(Yii::$app->user->id)]) ?>
</div>

</div>