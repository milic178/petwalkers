<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 3.6.2017
 * Time: 16:33

List of all user adds on page

 */
use yii\grid\GridView;

?>

<?php
$this->title = Yii::t('app', 'My Adds');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<?= GridView::widget([
    'dataProvider' =>$dataProvider,
    'layout'       => "{items}\n{pager}",
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
            'headerOptions' => ['style' => 'width:15%'],
        ],

        // 'trash_date',

        ['class' => 'yii\grid\ActionColumn',
            'headerOptions' => ['style' => 'width:8%'],
        ],
    ],
]);
?>

