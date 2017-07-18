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

    <div class="text-white">
        <p >
            <?= Yii::t('news','I realized that in Slovenia we do not have a simple way to coordinate the walking and sitting of pets, especially dogs and cats. With this I got the idea to develop web application and soon it turned out that I had enough knowledge to complete the project. The application would serve as a connecting  bridge between people who have more free time, who love animals and people who are employed or on holiday, and do not have time to walk or take cate of pets.') ?>
        </p>
        <p >
            <?= Yii::t('news','Petwalkers is a  website for finding a perfect sitter for your little friend. Thus dogs and cats are most popular pets, you can use it for any other, from turtle to elephant. We encourage o review your sitters so people can build an amazing community and have better experience using this platform!') ?>
        </p>

        <p>
            <?= Yii::t('news','For any questions, comments and problems with the website are available to you by e-mail:') ?>
            <a href="mailto:tscngwin@gmail.com">tscngwin@gmail.com</a>
        </p>
    </div>
</div>
