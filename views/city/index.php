<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'List of cities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <h1 class="page-header text-white"><?= Html::encode(Yii::t('app', 'List of cities')) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //Html::button(Yii::t('app', 'Create City'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::button(Yii::t('app', 'Create City'), ['value' => Url::to(['city/create']),
            'class' => 'showModalButton btn btn-success',
            'id'=>'modalCityButton']); ?>
    </p>

    <?php
    Modal::begin([
        'id'=>'createCity',
        'size'=>'modal-sm'
    ]);
    echo "<div id='modalFormContent'></div>";
    Modal::end();
    ?>

    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'zip_code',
            [
                'attribute' =>'id_region',
                'value' => 'idRegion.name',
                'filter'=>
                    \yii\helpers\ArrayHelper::map(\app\models\Region::find()->all(), 'id_region', 'name')
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' =>'Actions',
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
