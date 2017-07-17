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

        <p><?= Yii::t('app','All of the said data, except for cookies, is stored permanently on Transport.org. The cookie is stored only for the duration of the session and expires after 30 minutes of inactivity.') ?>

        <h2><?=Yii::t('app','Transmission of personal data') ?></h2>

        <p><?=Yii::t('app','Petwalkers provides the following information to Unregistered Website Visitors:') ?></p>
        <ul>
            <li><?=Yii::t('app','Petwalkers provides the following information to Unregistered Website Visitors:') ?></li>
        </ul>

        <p>Prevoz.org prijavljenim uporabnikom posreduje naslednje podatke:</p>
        <ul>
            <li>podatke, ki jih posreduje neprijavljenim obiskovalcem, ter telefonsko številko uporabnika.</li>
        </ul>

        <p>Podatek o piškotu bo Prevoz.org za čas trajanja seje samodejno posredoval spletnemu brskalniku iz katerega bo uporabnik prijavljen v sistem.</p>

        <p>Podatki, ki ne bodo posredovani tretjim osebam oz. jih bodo obdelovale samo osebe pod neposrednim nadzorom ekipe Prevoz.org:</p>
        <ul>
            <li>uporabniško ime</li>
            <li>naslov e-pošte</li>
            <li>geslo v šifrirani obliki</li>
            <li>IP-naslovi, iz katerih je uporabnik dostopal do spletne strani</li>
        </ul>

        <p>Prevoz.org si pridržuje pravico, da omenjene podatke prikaže v anonimizirani sumarni obliki z namenom statističnih prikazov.</p>

        <h3>Ukrepi za zavarovanje</h3>
        <p>Prevoz.org bo zagotovil vse razumne ukrepe, da podatki, ki niso namenjeni javnemu prikazu (registriranim in neregistriranim obiskovalcem), ne bodo dostopni tretjim osebam in javnosti.</p>

        <h3>Izjemno razkritje osebnih podatkov
        </h3>
        <p>Podatki, ki jih Prevoz.org zbira in obdeluje, bodo razkriti samo, če je taka obveznost določena v zakonu, ali v dobri veri, da je tako ukrepanje potrebno za: postopke pred sodišči ali drugimi državnimi organi, zaščito in uresničevanje zakonitih interesov Prevoz.org.</p>

        <h3>Privolitev uporabnika</h3>

        <p>S klikom na gumb Strinjam se uporabnik potrjuje, da je prebral vsebino teh pravil in da se strinja z obdelavo osebnih podatkov pod prej navedenimi pogoji. Sprejemanje teh pogojev se šteje za osebno privolitev posameznika po 1. odstavku 8. člena Zakona o varstvu osebnih podatkov.
        </p>

    </div>


</div>
