<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 31.5.2017
 * Time: 14:38
 */

use yii\helpers\Html;
use yii\bootstrap\Modal;



$this->title = Yii::t('app','Questions ');
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
<h1 class="text-white  page-header"><?= Yii::t('app','Frequently asked questions') ?></h1>
<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <div class="panel-group" id="accordion">
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?= Yii::t('app','What makes Petwalkers different from other dog walking services and apps?') ?></a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        To find a sitter for your pet we do not ask you for registration or email or any data. You are free to browse between sitters and select the one which suit you. Quite simply, we believe that your pet deserves someone who loves your pet as much as you do. User performance is rated with reviews and opinions written by community.
                    </div>
                </div>
            </div>
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><?= Yii::t('app','How much will it cost me to contact sitter i have selected?') ?></a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        For the moment all the services of finding a sitter or publishing an advert are free of any charge. This has been my project to improve the community and I intent to keep it free of any charge.
                    </div>
                </div>
            </div>

            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><?= Yii::t('app','What is the code given after I chose to contact my pet sitter?') ?></a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        That is called a review code composed of random numbers and characters. Every code is valid for 2 days from requesting the contact information. Code is unique identifier for you to leave your oppinion about the service provided by certain sitter.
                    </div>
                </div>
            </div>
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><?= Yii::t('app','How does the assessment of sitters work?') ?></a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        Assessment is relying purely on community. Meaning it depends on your satisfaction of the service provided by sitter. We tend to build an awesome community for everyone to enjoy! Inappropriate and verbally offensive reviews will not be tolerated by administrators. Users need to use their real names and data pseudonyms are not accepted.
                    </div>
                </div>
            </div>
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><?= Yii::t('app','Why do I have to accept or decline a review on my profile?') ?></a>
                    </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                    <div class="panel-body">
                        This is simply a feature to allow genuine reviews to be posted on your profile. If you recognize the peron for who you did a service simply approve it else decline that false review. You will not be able to see the content of review just the name of owner and pet you have provided your service to.
                    </div>
                </div>
            </div>

            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"><?= Yii::t('app','Is Petwalkers responsible in case of accidents during the sitting or walking the dog?') ?></a>
                    </h4>
                </div>
                <div id="collapseSeven" class="panel-collapse collapse">
                    <div class="panel-body">
                       Petwalkers service is not responsible for any kind of damage on private or public property.
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse8"><?= Yii::t('app','Is Petwalkers responsible for any damage done to me from pets i have been taking care of?') ?></a>
                    </h4>
                </div>
                <div id="collapse8" class="panel-collapse collapse">
                    <div class="panel-body">
                        Petwalkers service is not responsible for any kind of accident that happens to you while watching over other people pets.
                    </div>
                </div>
            </div>
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse9"><?= Yii::t('app','How do I know the petsitters on Petwalkers will take good care of my pet?') ?></a>
                    </h4>
                </div>
                <div id="collapse9" class="panel-collapse collapse">
                    <div class="panel-body">
                        The community uses reputations built over time to build trust, and ensure that all members respect the Petwalkers spirit of positive community collaboration.
                        When two members meet in real life to exchange service, they publicly rate each other: before you contact with another member you can read their ratings and benefit from the experience of other members who have met that person.
                        If you don't feel comfortable around person who is supposed to take care of your pet simply cancel the service and find another one.
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><?= Yii::t('app','Why did not my ad appear in the list even if I entered the correct search criteria?') ?></a>
                    </h4>
                </div>
                <div id="collapseSix" class="panel-collapse collapse">
                    <p class="panel-body">
                        Most certainly your publishing is invalid. Every ad you publish has expiration date which is 14 days. After that it becomes invalid and is not shown in general search. All you need to do is renew the publishing.
                    </p>
                </div>
            </div>

            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse10"><?= Yii::t('app','One or more of my adds will soon expire and become invalid what do I do?') ?></a>
                    </h4>
                </div>
                <div id="collapse10" class="panel-collapse collapse">
                    <div class="panel-body">
                        Simply create a new ad with same criteria under the Adverts section on the Menu.
                    </div>
                </div>
            </div>

            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse11"><?= Yii::t('app','How do i write a good and competitive ad for sitting pets?') ?></a>
                    </h4>
                </div>
                <div id="collapse11" class="panel-collapse collapse">
                    <div class="panel-body">
                        Explaining the features of your services is important, but explaining the benefits for the customer is really what it’s all about.
                        After all, people are more interested in what they get from your services than what you do.
                        People scan things quickly. make sure that your advertisement actually grabs and keeps their attention.
                        You do that with an effective headline. Add a little humor the content, use simple language.
                        Make sure your profile is updated and nicely written so you can earn credibility and trust.
                        People are nervous about spending their money. There are too many scammers and low-quality services out there.
                    </div>
                </div>
            </div>
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse12"><?= Yii::t('app','Do you have a suggestion for us?') ?></a>
                    </h4>
                </div>
                <div id="collapse12" class="panel-collapse collapse">
                    <div class="panel-body">
                        We are constantly trying to improve our service to meet your needs. Therefore, we are always listening to your good ideas, suggestions for improvement and new feature requests!
                        If you have any suggestions about the web application please feel free to contact us!
                    </div>
                </div>
            </div>
            <h3 class="text-white" style="text-align: center"><?= Yii::t('app','More questions? Don\'t hesitate!');?></h3>
            <div class="col-md-12 text-center">
                <?= Html::a(Yii::t('app','Contact us '),
                        ['/site/contact'],
                        [
                            'class'=>'btn btn-success btn-lg',
                            'id'=>'contact-us'
                        ]
                )
                ?>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.panel-group -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

