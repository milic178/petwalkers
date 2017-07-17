<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 17.7.2017
 * Time: 19:05
 */

use yii\helpers\Html;

$this->title = Yii::t('news','Pet walkers to be more in demand than teachers in next decade');
$this->params['breadcrumbs'][] = ['label' => Yii::t('news', 'News and articles'), 'url' => ['news/index']]; ?>


<body>
<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-white"><?= Yii::t('news','Pet walkers to be more in demand than teachers in next decade') ?>
            </h1>
        </div>
    </div>

    <div class="text-white">
        <p>
            <?= Yii::t('news','Memo to job-seekers: You\'ve probably got more of a chance walking dogs for a living than teaching kids in the coming decade\'s labor market. That\'s one of the implicit messages in a new report from the New York-based Conference Board on the changing composition of consumer demand -- the main driver of the economy -- over the next 10 years.') ?>
        </p><br>

        <p>
            <?= Yii::t('news','Its focus is on demographics, both the well-known aging of the Baby Boom generation and the less-publicized baby bust that began during the Great Recession as fertility rates dropped. Thus the choice of profession suggested by the business membership and research association\'s report. Spending on pets is forecast to rise strongly as boomers -- perhaps pining for children who have flown the coop -- shower their attention and money on new-found furry friends. Outlays on education will lag, though, as the potential student population comprising five- to 24-year-olds grows very slowly due to the downsized, post-Millennial Generation Z') ?>
        </p>


        <div class="text-center">
            <?=  Html::img(\Yii::$app->params['uploadUrl'] . 'new-jobs.png', [
                'class'=>'img-rounded ',
                'title'=>Yii::t('news','New job opportunities'),
            ]); ?>
        </div><br>

        <br>
        <p>
            <?= Yii::t('news','A word about the chart. The study projects spending increases based purely on demographics, including the growth of the population. The figures don\'t factor in the impact of rising wages and wealth over the period. As such, the projected 8.1 percent upturn in total household expenditures from 2015 to 2025 understates the increase that will actually happen. It\'s no surprise to see health-care expenditures surging as the number of Americans between the ages of 70 and 84 spikes by 50 percent.') ?>
        </p><br>
        <p>
            <?= Yii::t('news','But spending on books, newspapers and other reading materials will also boom as the growing ranks of retirees -- they\'re increasing by about 1.2 million a year, according to the report -- have more time to themselves. They\'ll also shell out more on home repairs as they become less willing or able to do them on their own,  the report says. The aging of the overall population results in smaller increases in spending on a variety of other goods and services -- restaurant meals and apparel, to name just two -- that are more popular with younger Americans. There\'s "reshuffling of the overall consumer mindset" coming in the next decade,  report co-author Brian Anderson said.') ?>


        </p>
    </div>


</div>
</body>
