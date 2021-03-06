<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AdvertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = Yii::t('app', 'Adverts');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="advert-index">

    <h1 class="page-header text-white"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php //Html::button(Yii::t('app', 'Create Advert'), ['create'], ['class' => 'btn btn-success']) ?>

    <p>
        <?= Html::button(Yii::t('app', 'Create Advert'), ['value' => Url::to(['advert/create']),
            'class' => 'showModalButton btn btn-success',
            'id'=>'modalCreateAdvertButton']); ?>
    </p>

    <?php
    Modal::begin([
        'id'=>'createAdvert',
        'size'=>'modal-lg'
    ]);
    echo "<div id='modalContentCreate'></div>";
    Modal::end();
    ?>


<div class="table-responsive">
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_advert',
            [
                'attribute' =>  'title',
                'headerOptions' => ['style' => 'width:15%'],
            ],
           // 'slug',
           // 'description',
            [
                'attribute' =>   'created',
                'value'=> function ($model){
                    $date = $model->created;
                    $dt = new DateTime($date);
                    return $dt->format('d-m-Y');
                },
                'headerOptions' => ['style' => 'width:10%'],
            ],
            [
                'attribute' =>   'valid_until',
                'value'=> function ($model){
                    $date = $model->valid_until;
                    $dt = new DateTime($date);
                    return $dt->format('d-m-Y');
                },
                'headerOptions' => ['style' => 'width:10%'],
            ],
            [
                'attribute' =>   'price',
                'headerOptions' => ['style' => 'width:5%'],
            ],
            [
                'attribute' => 'id_user',
                'value' => 'idUser.username',
                'headerOptions' => ['style' => 'width:10%'],
            ],
            [
                'attribute' => 'id_type',
                'value' => 'idType.name',
                'filter'=>
                    \yii\helpers\ArrayHelper::map(\app\models\AdvertType::find()->all(), 'id_type', 'name')
            ],
            [
                'attribute' => 'id_city',
                'value' => 'idCity.name',
                'filter'=>
                    \yii\helpers\ArrayHelper::map(\app\models\City::find()->all(), 'id_city', 'name'),
                'headerOptions' => ['style' => 'width:15%'],
            ],
            [
                'attribute' => 'id_animal',
                'value' => 'idAnimal.species',
                'filter'=>
                    \yii\helpers\ArrayHelper::map(\app\models\Animal::find()->all(), 'id_animal', 'species'),
                'headerOptions' => ['style' => 'width:15%'],
            ],

            // 'trash_date',

            ['class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'width:8%'],
            ],
        ],
    ]); ?>
</div>
<?php Pjax::end(); ?></div>
