<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Advert */

$this->title = Yii::t('app','Update').' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Adverts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_advert]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="advert-update">

    <h1 class="page-header text-white"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
