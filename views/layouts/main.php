<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Reviews;
use app\models\Advert;



AppAsset::register($this);
?>
<!---registering meta tags for facebook share, like..... --->
<?php
$this->registerMetaTag(Yii::$app->params['og_title'], 'og_title');
$this->registerMetaTag(Yii::$app->params['og_description'], 'og_description');
$this->registerMetaTag(Yii::$app->params['og_url'], 'og_url');
$this->registerMetaTag(Yii::$app->params['og_image'], 'og_image');
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

<div class="wrap ">

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
               ['label' =>'<i class="fa fa-star-half-o fa-lg" aria-hidden="true"></i> '. Yii::t('app','Rate walker'), 'url' => ['/review/enter-code'],'options' => ['id' => 'EnterCodeModalButton']],
               ['label' =>'<i class="fa fa-user-plus fa-lg" aria-hidden="true"></i> '. Yii::t('app','Register'), 'url' => ['/user/register']],
               ['label' =>'<i class="fa fa-sign-in fa-lg" aria-hidden="true"></i> '. Yii::t('app','Login'), 'url' => ['/user/login']],
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
               ['label' =>'<i class="fa fa-list-alt fa-lg" aria-hidden="true"></i> '. Yii::t('app','Advert').' '.Advert::notifyAdds(),
                   'items' =>[
                       ['label' =>'<i class="fa fa-list-ol" aria-hidden="true"></i> '. Yii::t('app','My Adds').' '.Advert::notifyAdds(), 'url' => '/advert/myadds'],
                   ],
               ],

               ['label' =>'<i class="fa fa-user-o fa-lg" aria-hidden="true"></i> '. Yii::$app->user->identity->username .' '.Reviews::countReviewsWaiting(),
                   'items' =>
                   [
                        ['label' =>'<i class="fa fa-cogs" aria-hidden="true"></i> '. Yii::t('app','My Profile'), 'url' => '/user/settings/profile'],
                        ['label' =>'<i class="fa fa-bell-o" aria-hidden="true"></i> ' .Yii::t('app','Notifications').' '.Reviews::countReviewsWaiting(), 'url' => '/review/list-reviews'],
                        ['label' =>'<i class="fa fa-sign-out" aria-hidden="true"></i> ' .Yii::t('app','Logout'), 'url' => '/site/logout','linkOptions' => ['data-method' => 'post']],

                   ]
                   ]
           ];
       }


       array_push($navItems,
           ['label' =>'<i class="fa fa-newspaper-o fa-lg" aria-hidden="true"></i> '. Yii::t('news','News'), 'url' => ['/news/index']],
           ['label' =>'<i class="fa fa-info fa-lg" aria-hidden="true"></i> '. Yii::t('app','Help'),
           'items' =>
               [
                   ['label' =>Yii::t('app','Questions '). '<i class="fa fa-question" aria-hidden="true"></i> ', 'url' => '/site/faq'],
                   ['label' =>Yii::t('app','How does it work '). '<i class="fa fa-question" aria-hidden="true"></i> ', 'url' => '/site/how'],
                   ['label' => Yii::t('app','About '). '<i class="fa fa-id-card fa-lg" aria-hidden="true"></i> ', 'url' => '/site/about'],
                   ['label' =>Yii::t('app','Contact us '). '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> ', 'url' => '/site/contact'],
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

<footer class="new-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-5 footer_about">
                <h3>
                    <i class="fa fa-paw fa-lg" aria-hidden="true"></i> <span class="heading">Petwalkers</span>
                </h3>
                <p><?=Yii::t('app','Petwalkers find best care for your pet.') ?></p>
                <p>
                    <small>
                    <?= Yii::t('app','Copyright © 2017 Petwalkers. All rights reserved.') ?>
                    </small>
                </p>
            </div>
            <div class="col-sm-12 col-md-3" style="padding-top: 1%">
                <ul >
                    <li><a class="footer-links"  href="/site/how"><?= Yii::t('app','How does it work ') ?></a></li>
                    <li><a class="footer-links"  href="/site/faq"><?= Yii::t('app','Questions ') ?></a></li>
                    <li><a class="footer-links"  href="/site/contact/"><?= Yii::t('app','Contact us ') ?></a></li>

                    <br>
                </ul>
            </div>
            <div class="col-sm-12 col-md-3" style="padding-top: 1%">
                <ul >
                    <li><a class="footer-links"  href="/news/index"><?=  Yii::t('news','News') ?></a></li>
                    <li><a class="footer-links"  href="/site/about"><?=  Yii::t('app','About ') ?></a></li>
                    <li><a class="footer-links"  href="/site/privacy"><?=  Yii::t('app','Privacy policy') ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>



<?= \bizley\cookiemonster\CookieMonster::widget([
    'box' => [
        'classButton'=>'cookie-button btn btn-default btn-circle btn-lg',
        'addOuterStyle'=>
            [
                'background-color'=>'#d6e416',
            ],
        'addInnerStyle' =>
            [
                'font-weight' => 'bold',
                'font-size' => '18px',
                'color'=>'#101727',
                'margin'=>'20px'
            ],

    ],
    'content' => [
        'buttonMessage' => 'I understand',

    ],
    'mode' => 'bottom'
]); ?>
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
