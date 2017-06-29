<?php
/* @var $this yii\web\View */

use  yii\grid\GridView;
use yii\widgets\Pjax;

?>

<h1><?= Yii::t('app','List of reviews waiting for confirmation') ?></h1>

<p>
    <?= Yii::t('app','Below is a list of all reviews waiting to be approved for your profile, simply click on review, if you recognize the reviewer confirm else decline it.') ?>
</p>

<?php
/*
                foreach ($model as $review):
                    echo($review->name.'<br>');
                endforeach;
*/

echo GridView::widget([
    'dataProvider' => $dataProvider,
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
            'attribute' =>   'valid_until',
            'value'=> function ($model){
                $date = $model->created;
                $dt = new DateTime($date);
                return $dt->format('d-m-Y');
            },
            'headerOptions' => ['style' => 'width:10%'],
        ],
        ['class' => 'yii\grid\ActionColumn',
            'headerOptions' => ['style' => 'width:5%'],
            'template' => '{approve} {decline}',
            'buttons' => [
                'approve' => function ($url, $model, $key) {

                },
                'decline' => function ($url, $model) {

                }
            ]
        ],

    ],
]);
?>
