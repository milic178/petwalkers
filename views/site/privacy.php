<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 17.7.2017
 * Time: 17:30
 *
 *  view to display privacy
 */

use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = Yii::t('app','Privacy policy');
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
    <h1 class="text-white  page-header"><?= Yii::t('app','Privacy policy') ?></h1>

    <div class="col-sm-12 result_box text-white">
        <p><?= Yii::t('app','Data entered by the user himself and for which accuracy he / she is responsible. Petwalkers web application is collecting the fallowing user data:') ?>
        <ul>
            <li><?=Yii::t('app','First Name') ?></li>
            <li><?=Yii::t('app','Last Name') ?></li>
            <li><?=Yii::t('app','Phone number +') ?></li>
            <li><?=Yii::t('user','Email') ?></li>
            <li><?=Yii::t('user','Password') ?></li>
            <li><?=Yii::t('app','Age') ?></li>
            <li><?=Yii::t('app','Social networks') ?></li>
            <li><?=Yii::t('app','All user entries in the forms on the website') ?></li>
        </ul>

        <p><?=Yii::t('app','Other Information') ?></p>
        <ul>
            <li><?=Yii::t('app','IP addresses from which the user accessed the site') ?></li>
            <li><?=Yii::t('app','A user identification cookie assigned to the user at the beginning of each session') ?></li>
        </ul>

        <p><?= Yii::t('app','All of the said data, except for cookies, is stored permanently on Petwalkers. The cookie is stored only for the duration of the session and expires after 30 minutes of inactivity.') ?>

        <h2><?=Yii::t('app','Transmission of personal data') ?></h2>

        <p><?=Yii::t('app','Petwalkers provides the following information to Unregistered Website Visitors:') ?></p>
        <ul>
            <li><?=Yii::t('app','The data that the individual himself entered into the form on the website (the desired place of arrival and departure, name, middle initials, surname and comment on the entry)') ?></li>
        </ul>

        <p><?=Yii::t('app','Petwalkers provides the following information to registered users:') ?></p>
        <ul>
            <li><?=Yii::t('app','The information it passes to undeclared visitors, and the user\'s phone number.') ?></li>
        </ul>

        <p>
            <?=Yii::t('app','During the session, Petwalkers will automatically forward the cookie information to the web browser from which the user will be logged into the system. Information that will not be transmitted to third parties or They will be processed only by persons under the direct supervision of the Petwalkers team:') ?>
            </p>
        <ul>
            <li><?=Yii::t('app','username') ?></li>
            <li><?=Yii::t('user','Email') ?></li>
            <li><?=Yii::t('user','Password') ?></li>
            <li><?=Yii::t('user','Email') ?></li>
            <li><?=Yii::t('app','IP-addresses from which the user accessed the site') ?></li>

        </ul>

        <p><?=Yii::t('app','Petwalkers reserves the right to display the data in an anonymous summary form for the purpose of statistical displays.') ?></p>

        <h3><?= Yii::t('app','Insurance measures') ?></h3>
        <p><?=Yii::t('app','Petwalkers will provide all reasonable steps to ensure that data not intended for public display (registered and unregistered visitors) will not be accessible to third parties or the public.') ?>
            </p>

        <h3>
            <?= Yii::t('app','Exceptional disclosure of personal information') ?>
        </h3>
        <p>
            <?= Yii::t('app','Data collected and processed by Petwalkers will only be disclosed if such an obligation is specified in the law or in good faith that such action is necessary for: proceedings before courts or other state bodies, the protection and the exercise of legitimate interests Petwalkers.') ?>
        </p>

        <h2><?= Yii::t('app','Consent of the user') ?></h2>

        <p>
            <?= Yii::t('app','By clicking the I agree button, the user acknowledges that he has read the content of these rules and that he agrees to the processing of personal data under the aforementioned conditions. The acceptance of these conditions shall be considered as personal consent of the individual according to Article 8 paragraph 1 of the Personal Data Protection Act.') ?>
        </p>

    </div>


</div>
