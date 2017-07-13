<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = $name;
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
<div class="site-error">

    <h1 class="page-header text-white"><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p class="text-white">
        <?= Yii::t('app','The above error occurred while the Web server was processing your request.') ?>
    </p>
    <p class="text-white">
        <?= Yii::t('app','Please contact us if you think this is a server error. Thank you.') ?>

    </p>

</div>
