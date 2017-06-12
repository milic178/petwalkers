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

$this->title = Yii::t('app', 'List of adverts');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<?php Pjax::begin(); ?>
<div class="text-right">
    <span class="alert alert-info">
        <?=
        Yii::t('app','All result shown are for price of maximum {price} €/hour',
            ['price'=> $_GET['Advert']['price']])
        ?>
    </span>
</div>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
// making every row of DataGrid clickble, sending us to view that add
    'rowOptions'   => function ($model) {
        return ['data-id' => $model->id_advert];
    },
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
                \yii\helpers\ArrayHelper::map(\app\models\AdvertType::find()->all(), 'id_type', 'name'),
            'headerOptions' => ['style' => 'width:13%']
        ],
        [
            'attribute' => 'id_animal',
            'value' => 'idAnimal.species',
            'filter'=>
                \yii\helpers\ArrayHelper::map(\app\models\Animal::find()->all(), 'id_animal', 'species'),
            'headerOptions' => ['style' => 'width:13%'],
        ],

        [
            'attribute' => 'id_city',
            'value' => 'idCity.name',
            'filter'=>
                \yii\helpers\ArrayHelper::map(\app\models\City::find()->all(), 'id_city', 'name'),
            'headerOptions' => ['style' => 'width:15%'],
        ],
        [
            'attribute' => 'id_region',
 // name of 2 relations then name of attribute
            'value' => 'idCity.idRegion.name',
        ],



        ['class' => 'yii\grid\ActionColumn','template'=>'{view}',
            'headerOptions' => ['style' => 'width:3%'],
        ],
    ],
]); ?>
<?php Pjax::end(); ?></div>

<?php
// making every row of DataGrid clickable, sending us to view that add
$this->registerJs("

    $('td').click(function (e) {
        var id = $(this).closest('tr').data('id');
        if(e.target == this)
            location.href = '" . Url::to(['advert/view']) . "?id=' + id;
    });

");