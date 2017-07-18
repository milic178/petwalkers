<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Modal;
?>


<?php
$this->title = Yii::t('news','News and articles');
$this->params['breadcrumbs'][] = ['label' => Yii::t('news', 'News and articles'), 'url' => ['news/index']]; ?>

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

<body>
<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-white"><?= Yii::t('news','News and articles') ?>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Blog Post Row -->
    <div class="row">
        <div class="col-md-5">
                <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'walking-dog-main.jpg', [
                    'class'=>'img-responsive img-hover',
                    'title'=>Yii::t('news','Walking the dog'),
                ]); ?>
        </div>
        <div class="col-md-6">
            <h3 class="p-style">
                <a href="/news/news-one"><?= Yii::t('news','Why walking your dog is great exercise?') ?></a>
            </h3>
            <p class="text-white">
                <?= Yii::t('news','Having trouble sticking to an exercise program? Research shows that dogs are actually Nature’s perfect personal trainers—loyal, hardworking, energetic and enthusiastic. And, unlike your friends, who may skip an exercise session because of appointments, extra chores or bad weather, dogs never give you an excuse to forego exercising') ?>
            </p>
            <a class="btn btn-primary" href="/news/news-one"><?= Yii::t('app','Read More ')?> <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Blog Post Row -->
    <div class="row">
        <div class="col-md-5">
            <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'sitters-in-demand.jpg', [
                'class'=>'img-responsive img-hover',
                'title'=>Yii::t('news','Sitters in demand'),
            ]); ?>
        </div>
        <div class="col-md-6">
            <h3 class="p-style">
                <a href="/news/news-two"><?= Yii::t('news','Pet walkers to be more in demand than teachers in next decade') ?></a>
            </h3>
            <p class="text-white">
                <?= Yii::t('news','Memo to job-seekers: You\'ve probably got more of a chance walking dogs for a living than teaching kids in the coming decade\'s labor market. That\'s one of the implicit messages in a new report from the New York-based Conference Board on the changing composition of consumer demand the main driver of the economy over the next 10 years') ?>
            </p>
            <a class="btn btn-primary" href="/news/news-two"><?= Yii::t('app','Read More ')?><i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Blog Post Row -->
    <div class="row">
        <div class="col-md-5">
            <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'cats-main.jpg', [
                'class'=>'img-responsive img-hover',
                'title'=>Yii::t('news','Happy pets'),
            ]); ?>
        </div>
        <div class="col-md-6">
            <h3 class="p-style">
                <a href="/news/news-three"><?= Yii::t('news','Pets can benefit from spending time outside') ?></a>
            </h3>
            <p class="text-white">
                <?= Yii::t('news','Most pets already spend a little time outside everyday, mainly when going out to go to the bathroom. But many owners don\'t fully appreciate the added benefits from allowing their pets to spend more significant time outdoors. The following is just a few of the benefits for your pet from being outside:') ?>
            </p>
            <a class="btn btn-primary" href="/news/news-three"><?= Yii::t('app','Read More ')?><i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    <!-- /.row -->






</div>
<!-- /.container -->
</body>

