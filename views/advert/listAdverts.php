<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 6.6.2017
 * Time: 16:45
 *
 * View for displaying list of adverts with search parameters passed with index site
 */

use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Adverts');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<?php Pjax::begin(); ?>

<?= GridView::widget([
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
            'headerOptions' => ['style' => 'width:10%'],
        ],
        // 'valid_until',
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


        ['class' => 'yii\grid\ActionColumn','template'=>'{view}',
            'headerOptions' => ['style' => 'width:8%'],
        ],
    ],
]); ?>
<?php Pjax::end(); ?></div