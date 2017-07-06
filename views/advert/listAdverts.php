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


<!-- Displaying modal form for entering review code and rating user -->
<div>
    <?php
    Modal::begin([
        'header' => '<h3>'.Yii::t('app','Rate walker').'</h3>',
        'id'=>'enter-code',
        'size'=>'modal-sm',
    ]);
    echo "<div id='modalFormContent'></div>";
    Modal::end();
    ?>
</div>
    <div class="text-center">
    <span class="alert alert-info">
        <?php

        if (empty($_GET['Advert']['price'])):
            $value = "50";
        else:
            $value = $_GET['Advert']['price'];
        endif;
        echo Yii::t('app','All result shown are for price of maximum {price}€/hour',['price'=> $value ]);
        ?>
    </span>
    </div>
<?php Pjax::begin(); ?>
<div class="row">
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
      /*  [
            'attribute' =>  'title',
            'headerOptions' => ['style' => 'width:15%'],
        ],
      */
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
            'headerOptions' => ['style' => 'width:15%'],
        ],
        [
            'attribute' => 'id_type',
            'value' => 'idType.name',
            //'filter'=>
          //      \yii\helpers\ArrayHelper::map(\app\models\AdvertType::find()->all(), 'id_type', 'name'),
            'filter' => Html::activeDropDownList($searchModel, 'id_type', \yii\helpers\ArrayHelper::map(\app\models\AdvertType::find()->all(), 'id_type', 'name'),['class'=>'form-control','prompt' => Yii::t('app','Any type')]),

            'headerOptions' => ['style' => 'width:13%']
        ],
        [
            'attribute' => 'id_animal',
            'value' => 'idAnimal.species',
           // 'filter'=>
           //     \yii\helpers\ArrayHelper::map(\app\models\Animal::find()->all(), 'id_animal', 'species'),
            'headerOptions' => ['style' => 'width:13%'],
            'filter' => Html::activeDropDownList($searchModel, 'id_animal', \yii\helpers\ArrayHelper::map(\app\models\Animal::find()->all(), 'id_animal', 'species'),['class'=>'form-control','prompt' => Yii::t('app','Any animal')]),
        ],

        [
            'attribute' => 'id_city',
            'value' => 'idCity.name',
         //   'filter'=>
         //       \yii\helpers\ArrayHelper::map(\app\models\City::find()->all(), 'id_city', 'name'),
            'filter' => Html::activeDropDownList($searchModel, 'id_city', \yii\helpers\ArrayHelper::map(\app\models\City::find()->all(), 'id_city', 'name'),['class'=>'form-control','prompt' => Yii::t('app','Any city')]),
            'headerOptions' => ['style' => 'width:20%'],
        ],
        [
            'attribute' => 'id_region',
 // name of 2 relations then name of attribute
            'value' => 'idCity.idRegion.name',
            'headerOptions' => ['style' => 'width:15%'],

        ],



        ['class' => 'yii\grid\ActionColumn','template'=>'{view}',
            'headerOptions' => ['style' => 'width:3%'],
        ],
    ],
]); ?>
<?php Pjax::end(); ?></div>

<?php
// making every row of DataGrid clickable except filter columns, sending us to view  add
$this->registerJs("

    $('tbody td').css('cursor', 'pointer');
    $('tbody td').click(function (e) {
        var id = $(this).closest('tr').data('id');
        if (e.target == this)
            location.href = '" . Url::to(['advert/view']) . "?id=' + id;
    });

");
?>
</div>
