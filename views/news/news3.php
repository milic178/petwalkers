<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 17.7.2017
 * Time: 19:05
 */

use yii\bootstrap\Modal;
use yii\helpers\Html;

$this->title = Yii::t('news','Pets can benefit from spending time outside');
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
                <h1 class="page-header text-white"><?= Yii::t('news','Pets can benefit from spending time outside') ?>
                </h1>
            </div>
        </div>

        <div class="text-white">

            <p>
                <?= Yii::t('news','Most pets already spend a little time outside everyday, mainly when going out to go to the bathroom. But many owners don\'t fully appreciate the added benefits from allowing their pets to spend more significant time outdoors. The following is just a few of the benefits for your pet from being outside:') ?>
            </p><br>


            <ul>
                <li>
                    <?= Yii::t('news','Exercise...Very few pets get enough exercise, and for most dogs it is extremely difficult to be properly exercised indoors. Most dogs and many cats will greatly benefit from a couple of daily walks or some play time in the yard chasing a ball or running.') ?>
                </li>
                <li>
                    <?= Yii::t('news','Weight loss and control...Dogs that spend time outdoors have an easier time losing weight and keeping their weight down. Many dogs gain weight because of boredom and lack of activity. Spending time outside eliminates both of these contributors to weight gain.') ?>
                </li>
                <li>
                    <?= Yii::t('news','Relieve Boredom...Like people, dogs and cats get bored. In fact, boredom is one of the leading causes of behavior problems, including chewing and excessive barking. The outdoors provides a different and interesting environment that will help keep your pet\'s mind active and alert while curbing behavior you would rather not see.') ?>
                </li>
            </ul>

            <div>
                <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'dog-cat-playing.jpg', [
                    'class'=>'img-responsive center-block',
                    'title'=>Yii::t('news','Spending time outside'),
                ]); ?>
            </div><br>

            <br>
            <p>
                <?= Yii::t('news','Many dogs that aren\'t used to spending time outdoors are often at a loss initially to know what to do. They will often stand at the door and beg to come in because spending time outdoors may be an unusual experience for them. A few tips when getting your pet to spend time outdoors include:') ?>

            </p><br>

            <ul>
                <li>
                    <?= Yii::t('news','Spend time with them outside. Go for a walk and use a retractable leash to help them get more exercise.') ?>
                </li>
                <li>
                    <?= Yii::t('news','Play a game. Throw a flying disc on land or in the water. This is a great way to exercise and relieve boredom.') ?>
                </li>
                <li>
                    <?= Yii::t('news','Provide stimulation in the form of toys or chews. Many dogs love to go outside and chew on a rawhide or similar bone, or a rubber chew toy. While they may not be exercising while they chew, they get all the other benefits of being outdoors.') ?>
                </li>
            </ul>
            <br>

            <p>
                <?= Yii::t('news','Spending time outdoors is a very normal and important part of a pet\'s life. As long as they are safely contained, supervised, and protected from the elements, outside time is one of the best health benefits you can give your pet. And don\'t forget, your pet should always have a current nametag attached to his collar whenever he goes outside.') ?>

            </p>

        </div>



    </div>
    </body>

