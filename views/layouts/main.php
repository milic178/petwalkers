<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
       <?php
       NavBar::begin([
           'brandLabel' => 'Petwalkers',
           'brandUrl' => Yii::$app->homeUrl,
           'options' => [
               'class' => 'navbar-inverse navbar-fixed-top',
           ],
       ]);

/**
* Constructing menu array if
*/
       if (Yii::$app->user->isGuest) {
           $navItems=[
               ['label' => 'Sign In', 'url' => ['/user/login']],
               ['label' => 'Sign Up', 'url' => ['/user/register']]
           ];
       }
       else {
           $navItems=[
               ['label' => 'Home', 'url' => ''.Yii::$app->homeUrl.''],
               ['label' => 'Manage Adds', ''.Yii::$app->homeUrl.'' => ['#'],'visible' => Yii::$app->user->identity->isAdmin],
               ['label' => 'Manage Users', 'url' => ['/user/admin/index'],'visible' => Yii::$app->user->identity->isAdmin],
               ['label' => ' '. Yii::$app->user->identity->username .' ',
                   'items' =>
                   [
                        ['label' => 'My Profile', 'url' => '/user/settings/profile'],
                        ['label' => 'My adds', 'url' => '#'],
                        ['label' => 'Logout', 'url' => '/site/logout','linkOptions' => ['data-method' => 'post']],
                   ]
               ]

           ];
       }
/**
* Right top menu
*/
       echo Nav::widget([
           'options' => ['class' => 'navbar-nav navbar-right'],
           'items' =>$navItems,
       ]);
/**
* Left top menu
*/
       echo Nav::widget([
           'options' => ['class' => 'navbar-nav navbar-left'],
           'items' =>[
               ['label' => 'About', 'url' => ['/site/about']],
               ['label' => 'Contact', 'url' => ['/site/contact']]
           ]
       ]);

       NavBar::end();




       ?>


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Petwalkers <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
