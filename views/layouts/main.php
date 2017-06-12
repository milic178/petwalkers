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
           'brandLabel' =>'<i class="fa fa-paw fa-lg" aria-hidden="true"></i> '. 'Petwalkers',
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
               ['label' =>'<i class="fa fa-user-plus fa-lg" aria-hidden="true"></i> '. Yii::t('app','Register'), 'url' => ['/user/register']],
               ['label' =>'<i class="fa fa-sign-in fa-lg" aria-hidden="true"></i> '. Yii::t('app','Login'), 'url' => ['/user/login']],
               ['label' =>'<i class="fa fa-star-half-o fa-lg" aria-hidden="true"></i> '. Yii::t('app','Rate walker'), 'url' => ['#']],


           ];
       }
       else {
           $navItems=[
               ['label' =>'<i class="fa fa-home fa-lg" aria-hidden="true"></i> '. Yii::t('app','Home'), 'url' => ''.Yii::$app->homeUrl.''],
               ['label'=>'<i class="fa fa-bolt fa-lg" aria-hidden="true"></i> '. 'Administrator','visible' => Yii::$app->user->identity->isAdmin,
                   'items' =>
                   [
                       ['label' =>'<i class="fa fa-list-alt" aria-hidden="true"></i> '. Yii::t('app','Manage Adds'), 'url' => ['/advert/index']],
                       ['label' =>'<i class="fa fa-users" aria-hidden="true"></i> '. Yii::t('app','Manage Users'), 'url' => ['/user/admin/index']],
                       ['label' =>'<i class="fa fa-map" aria-hidden="true"></i> '. Yii::t('app','List of cities'), 'url' => ['/city/index']],
                   ]
               ],
               ['label' =>'<i class="fa fa-list-alt fa-lg" aria-hidden="true"></i> '. Yii::t('app','Advert').'',
                   'items' =>[
                       ['label' =>'<i class="fa fa-plus" aria-hidden="true"></i> '. Yii::t('app','Create Advert'), 'url' => '/advert/create'],
                       ['label' =>'<i class="fa fa-list-ol" aria-hidden="true"></i> '. Yii::t('app','My Adds'), 'url' => '/advert/myadds'],
                   ],
               ],

               ['label' =>'<i class="fa fa-user-o fa-lg" aria-hidden="true"></i> '. Yii::$app->user->identity->username .' ',
                   'items' =>
                   [
                        ['label' =>'<i class="fa fa-cogs" aria-hidden="true"></i> '. Yii::t('app','My Profile'), 'url' => '/user/settings/profile'],

                        ['label' =>'<i class="fa fa-sign-out" aria-hidden="true"></i> ' .Yii::t('app','Logout'), 'url' => '/site/logout','linkOptions' => ['data-method' => 'post']],
                   ]
               ]

           ];
       }


       array_push($navItems,
           ['label' =>'<i class="fa fa-id-card fa-lg" aria-hidden="true"></i> '. Yii::t('app','About'), 'url' => '/site/about'],
           ['label' =>'<i class="fa fa-info" aria-hidden="true"></i> '. Yii::t('app','Help'),
           'items' =>
               [
                   ['label' =>'<i class="fa fa-question" aria-hidden="true"></i> '. Yii::t('app','Questions'), 'url' => '/site/faq'],
                   ['label' =>'<i class="fa fa-lightbulb-o" aria-hidden="true"></i> '. Yii::t('app','How does it work?'), 'url' => '/site/how'],
                   ['label' =>'<i class="fa fa-pencil-square-o" aria-hidden="true"></i> '. Yii::t('app','Contact us'), 'url' => '/site/contact'],
               ]
       ]);

// Top right menu
       echo Nav::widget([
           'options' => ['class' => 'navbar-nav navbar-right'],
           'encodeLabels' => false,
           'items' =>$navItems
       ]);
       ?>

<div class="navbar-text pull-left">
    <?=
    // langage picker inside navbar
    \lajax\languagepicker\widgets\LanguagePicker::widget([
        'skin' => \lajax\languagepicker\widgets\LanguagePicker::SKIN_DROPDOWN,
        'size' => \lajax\languagepicker\widgets\LanguagePicker::SIZE_LARGE
    ]);
    ?>
</div>

<?php NavBar::end(); ?>

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
