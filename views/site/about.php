<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = Yii::t('app','About ');
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
<div class="site-about">
    <h1 class="text-white  page-header"><?= Yii::t('app','About ') ?></h1>

    <p class="text-white">
        Petwalkers is a  website for finding a perfect walker for your little friend. You can list trough advertisements and see profiles of users.
        We encourage  to review your walkers so we can build an amazing community and have better experience using this platform =)!
    </p>


</div>
