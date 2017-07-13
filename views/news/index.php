<?php
/* @var $this yii\web\View */
?>


<?php
$this->title = Yii::t('news','News and articles');
$this->params['breadcrumbs'][] = ['label' => Yii::t('news', 'News and articles'), 'url' => ['news/index']]; ?>

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
            <a href="blog-post.html">
                <img class="img-responsive img-hover" src="http://placehold.it/600x300" alt="">
            </a>
        </div>
        <div class="col-md-6">
            <h3 class="p-style">
                <a href="blog-post.html"><?= Yii::t('news','Why walking your dog is great exercise?') ?></a>
            </h3>
            <p class="text-white">
                <?= Yii::t('news','Having trouble sticking to an exercise program? Research shows that dogs are actually Nature’s perfect personal trainers—loyal, hardworking, energetic and enthusiastic. And, unlike your friends, who may skip an exercise session because of appointments, extra chores or bad weather, dogs never give you an excuse to forego exercising') ?>
            </p>
            <a class="btn btn-primary" href="blog-post.html">Read More <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Blog Post Row -->
    <div class="row">
        <div class="col-md-5">
            <a href="blog-post.html">
                <img class="img-responsive img-hover" src="http://placehold.it/600x300" alt="">
            </a>
        </div>
        <div class="col-md-6">
            <h3 class="p-style">
                <a href="blog-post.html"><?= Yii::t('news','Pet walkers to be more in demand than teachers in next decade') ?></a>
            </h3>
            <p class="text-white">
                <?= Yii::t('news','Memo to job-seekers: You\'ve probably got more of a chance walking dogs for a living than teaching kids in the coming decade\'s labor market. That\'s one of the implicit messages in a new report from the New York-based Conference Board on the changing composition of consumer demand the main driver of the economy over the next 10 years') ?>
            </p>
            <a class="btn btn-primary" href="blog-post.html">Read More <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Blog Post Row -->
    <div class="row">
        <div class="col-md-5">
            <a href="blog-post.html">
                <img class="img-responsive img-hover" src="http://placehold.it/600x300" alt="">
            </a>
        </div>
        <div class="col-md-6">
            <h3 class="p-style">
                <a href="blog-post.html"><?= Yii::t('news','Pets can benefit from spending time outside') ?></a>
            </h3>
            <p class="text-white">
                <?= Yii::t('news','Most pets already spend a little time outside everyday, mainly when going out to go to the bathroom. But many owners don\'t fully appreciate the added benefits from allowing their pets to spend more significant time outdoors. The following is just a few of the benefits for your pet from being outside:') ?>
            </p>
            <a class="btn btn-primary" href="blog-post.html">Read More <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    <!-- /.row -->






</div>
<!-- /.container -->
</body>

