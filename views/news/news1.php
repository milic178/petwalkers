<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 17.7.2017
 * Time: 19:04
 */

use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = Yii::t('news','Why walking your dog is great exercise?');
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
            <h1 class="page-header text-white"><?= Yii::t('news','Why walking your dog is great exercise?') ?>
            </h1>
        </div>
    </div>

    <div class="text-white">
        <p>
            <?= Yii::t('news','Having trouble sticking to an exercise program? Research shows that dogs are actually Nature’s perfect personal trainers—loyal, hardworking, energetic and enthusiastic. And, unlike your friends, who may skip an exercise session because of appointments, extra chores or bad weather, dogs never give you an excuse to forego exercising.')?>
        </p>

        <div>
            <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'walking-dog.jpg', [
                'class'=>'img-responsive center-block',
                'title'=>Yii::t('news','Walking the dog'),
            ]); ?>
        </div><br>

        <p>
            <?= Yii::t('news','In 2008, the U.S. Department of Labor reported that only 16 percent of Americans ages 15 and older exercised at all on an average day! This is where your canine personal trainer can help. A survey of dog owners, conducted at the University of Western Australia and published in Health Promotion Journal of Australia in August 2008, revealed that dogs are great motivators for walking because they:')?>
        </p>
        <ul>
            <li>
                <?= Yii::t('news','Provide a strong motivation to maintain a program') ?>
            </li>
            <li>
                <?= Yii::t('news','Are good walking companions') ?>
            </li>
            <li>
                <?= Yii::t('news','Provide good social support when exercising') ?>
            </li>
        </ul>
        <p>
            <?= Yii::t('news','What are the benefits of regular exercise? Dr. Joanna Kruk reviewed medical literature describing the health benefits of exercise. Her research showed that the risk of developing a number of serious health problems is reduced by physical activity and exercise:')?>
        </p>
        <ul>
            <li>
                <?= Yii::t('news','Breast cancer risk reduced by 75 percent') ?>
            </li>
            <li>
                <?= Yii::t('news','Heart disease risk decreased by 49 percent') ?>
            </li>
            <li>
                <?= Yii::t('news','Diabetes risk lowered by 35 percent') ?>
            </li>
            <li>
                <?= Yii::t('news','Colon cancer risk decreased by 22 percent') ?>
            </li>
        </ul>

        <p>
            <?= Yii::t('news','How much exercise is enough? According to the World Health Organization, adequate exercise to promote good health includes:')?>
        </p>

        <ul>
            <li>
                <?= Yii::t('news','60 minutes of moderate to vigorous activity daily for children 5 to 17 years old') ?>
            </li>
            <li>
                <?= Yii::t('news','30 minutes of moderate-intensity exercise five days per week for adults 18 to 65 years old, plus strengthening exercises two days per week') ?>
            </li>
           <li>
                <?= Yii::t('news','30 minutes of moderate-intensity exercise five days per week, with modifications as needed in seniors over 65 years old, plus flexibility and balance exercises') ?>
            </li>
        </ul>

<br>
        <p>
            <?= Yii::t('news','Researchers at the University of Western Australia found that seven in every 10 adult dog owners achieved 150 minutes of physical exercise per week, compared with only four in every 10 non-owners. Among new dog owners monitored for one year, recreational walking increased by an average of 48 minutes per week. And, among folks like you who read dog magazines, six in every 10 walked their dogs every day.')?>
        </p>


        <p>
            <?= Yii::t('news','Is dog walking really effective exercise? Many people are become interested in exercise to help lose excess weight. Obesity is a global epidemic, affecting about one in every three to four adults in the United States and Europe. Dog ownership and obesity were evaluated in Seattle, Wash., and Baltimore, Md., in a study published in the journal Preventive Medicine in September 2008. Dog owners who reported walking their dogs were almost 25 percent less likely to be obese than people without dogs. Researchers in the April 2008 issue of Health Promotion Journal of Australia reported that having a dog in the house reduced the risk of childhood obesity by half!')?>
        </p>
<br>
        <p>
            <?= Yii::t('news','Plan for success. It’s easy to forget about healthy walking plans, so set the stage for a successful program:')?>
        </p>


        <ul>
            <li>
                <?= Yii::t('news','Establish a walking schedule; plan to walk 30 minutes total each day. This might include a 10-minute neighborhood walk in the morning and a 20-minute romp at the dog park after work. Or maybe three 10-minute walks or one 30-minute walk fit in better with your day.') ?>
            </li>
            <li>
                <?= Yii::t('news','If dog walking is “scheduled” into each day, you’ll feel more responsible for sticking with your program. Plus, your dog will also get used to the routine and remind you when “it’s time!”') ?>
            </li>
            <li>
                <?= Yii::t('news','Track your progress') ?>
            </li>
            <li>
                <?= Yii::t('news','Post a calendar on the refrigerator and add a sticker for each 10 minutes of walking you do each day. This will reinforce your good behavior and make you pause before opening the door to grab a calorie-laden snack!') ?>
            </li>
        </ul>

        <p>
            <?= Yii::t('news','So, grab a leash, whistle up the pup, and go for a walk—today and every day! Dog walking is a great way to jumpstart a healthy lifestyle program.')?>
        </p>
    </div>


</div>

</body>
