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
               ['label' => Yii::t('app','About'), 'url' => '/site/about'],
               ['label' => Yii::t('app','Register'), 'url' => ['/user/register']],
               ['label' => Yii::t('app','Login'), 'url' => ['/user/login']],

           ];
       }
       else {
           $navItems=[
               ['label' => Yii::t('app','Home'), 'url' => ''.Yii::$app->homeUrl.''],
               ['label'=> 'Administrator','visible' => Yii::$app->user->identity->isAdmin,
                   'items' =>
                   [
                       ['label' => Yii::t('app','Manage Adds'), 'url' => ['/advert/index']],
                       ['label' => Yii::t('app','Manage Users'), 'url' => ['/user/admin/index']],
                       ['label' => Yii::t('app','List of cities'), 'url' => ['/city/index']],
                   ]
               ],
               ['label' => Yii::t('app','Advert').'',
                   'items' =>[
                       ['label' => Yii::t('app','Create Advert'), 'url' => '/advert/create'],
                       ['label' => Yii::t('app','My Adds'), 'url' => '/advert/myadds'],
                   ],
               ],

               ['label' => ' '. Yii::$app->user->identity->username .' ',
                   'items' =>
                   [
                        ['label' => Yii::t('app','My Profile'), 'url' => '/user/settings/profile'],

                        ['label' => Yii::t('app','Logout'), 'url' => '/site/logout','linkOptions' => ['data-method' => 'post']],
                   ]
               ]

           ];
       }

       array_push($navItems,['label' => Yii::t('app','Help'),
           'items' =>
               [
                   ['label' => Yii::t('app','Questions'), 'url' => '/site/faq'],
                   ['label' => Yii::t('app','How does it work?'), 'url' => '/site/how'],
                   ['label' => Yii::t('app','Contact us'), 'url' => '/site/contact'],
               ]
       ]);

/**
* Top right menu
*/
       echo Nav::widget([
           'options' => ['class' => 'navbar-nav navbar-right'],
           'items' =>$navItems
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
