<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */

$this->title = empty($profile->name) ? Html::encode($profile->user->username) : Html::encode($profile->name);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <?=  Html::img($profile->getImageUrl(), [
                    'class'=>'img-thumbnail',
                    'width'=>'100%',
                    'height'=>'10%',
                    'title'=>$profile->first_name,
                ]); ?>
            </div>
            <div class="col-sm-6 col-md-8">
                <h4><?= $this->title ?></h4>
                <ul style="padding: 0; list-style: none outside none;">
                    <?php if (!empty($profile->last_name)): ?>
                        <li>
                            <i class="glyphicon glyphicon-map-marker text-muted"></i> <?= Html::encode($profile->last_name) ?>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($profile->telephone)): ?>
                        <li>
                            <i class="glyphicon glyphicon-globe text-muted"></i> <?= Html::a(Html::encode($profile->telephone), Html::encode($profile->telephone)) ?>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($profile->about_me)): ?>
                        <li>
                            <i class="glyphicon glyphicon-envelope text-muted"></i> <?= Html::a(Html::encode($profile->about_me)) ?>
                        </li>
                    <?php endif; ?>
                    <?php if (!$profile->user->email): ?>
                        <li>
                            <i class="glyphicon glyphicon-envelope text-muted"></i> <?= Html::a(Html::encode($profile->user->email)) ?>
                        </li>
                    <?php endif; ?>
                    <li>
                        <i class="glyphicon glyphicon-time text-muted"></i> <?= Yii::t('user', 'Joined on {0, date}', $profile->user->created_at) ?>
                    </li>
                </ul>
                <?php if (!empty($profile->bio)): ?>
                    <p><?= Html::encode($profile->bio) ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= DetailView::widget([
    'model' => $profile,
    'attributes' => [
        'first_name',
        'last_name',
        'about_me',
    
    ],
]) ?>
