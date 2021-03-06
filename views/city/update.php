<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\City */

$this->title = Yii::t('app', 'Update City', [
    'modelClass' => 'City',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'List of cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_city]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="city-update">

    <h1 class="page-header text-white"><?= Html::encode(Yii::t('app','Update City')) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
