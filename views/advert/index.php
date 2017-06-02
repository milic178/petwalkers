<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AdvertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Adverts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advert-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Advert'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_advert',
            'title',
           // 'slug',
           // 'description',
            'created',
            'valid_until',
            'price',
            [
                'attribute' => 'id_user',
                'value' => 'idUser.username',
            ],
            [
                'attribute' => 'id_type',
                'value' => 'idType.name',
                'filter'=>
                    \yii\helpers\ArrayHelper::map(\app\models\AdvertType::find()->all(), 'id_type', 'name')
            ],
            [
                'attribute' => 'id_region',
                'value' => 'idRegion.name',
                'filter'=>
                    \yii\helpers\ArrayHelper::map(\app\models\Region::find()->all(), 'id_region', 'name')
            ],
            'trash_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
