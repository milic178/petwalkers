<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 19.5.2017
 * Time: 22:29
 */

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = Yii::t('app','How does it work ');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Displaying modal form for entering review code and rating user -->
<div>
    <?php
    Modal::begin([
        'header' => '<h3>'.Yii::t('app','Rate walker').'</h3>',
        'id'=>'enter-code',
        'size'=>'modal-sm',
        'clientOptions' => [
            'backdrop' => 'static'
        ]
    ]);
    echo "<div id='modalFormContent'></div>";
    Modal::end();
    ?>
</div>


<!-- Content Row -->
<h1 class="text-white  page-header"><?= Yii::t('app','How does it work ') ?></h1>

<div class="row">
    <div class="col-lg-12 result_box">
        <p class="text-white">
            <?= Yii::t('news','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.') ?>
        </p>
            <?= Html::img(\Yii::$app->params['uploadUrl'].'how.png',[
                'alt'=>'some',
                'class'=>'img-responsive center-block'
            ]);?>
    </div>
</div>
<!-- /.row -->

