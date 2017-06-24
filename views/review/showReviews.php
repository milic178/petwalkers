<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 19.6.2017
 * Time: 17:33
 *
 * view for showing user views with ratings and desciprition
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Carousel;
use kartik\rating\StarRating;

$this -> title = Yii::t('app','Show reviews');
?>

<div class="container">
    <div class="row">
        <h2><?= Yii::t('app','User reviews:') ?></h2>
    </div>
</div>
<div class="carousel-reviews broun-block">
    <div class="container">
        <div class="row">
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
<!-- If user has no reviews we display generic review window else we show reiews-->
                    <?php if($model == false):?>
                    <div class="item active">
                        <div class="col-md-4 col-sm-6">
                            <div class="block-text rel zmin">
                                <a title="" href="#"><?=Yii::t('app','Random user opinion') ?></a>
                                <div class="mark"><?= Yii::t('app','My rating:') ?> <span class="rating-input"><span class="glyphicon glyphicon-star-empty"></span></span><span class="rating-input"><span class="glyphicon glyphicon-star-empty"></span></span><span class="rating-input"><span class="glyphicon glyphicon-star-empty"></span></span></div>
                                <p><?= Yii::t('app','User has yet not been rated by community!') ?></p>
                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                            </div>
                            <div class="person-text rel"><br>
                                <?= Html::img('@web/uploads/default_user.jpg', [
                                    'alt'=>'default user',
                                    'class'=>'img-circle',
                                    'width'=>'10%',
                                    'height'=>'10%',
                                ]);?>
                            </div>
                        </div>
                    </div>
                    <?php else:?>

                        <?php $i = 1; ?>
                        <?php foreach ($model as $reviews): ?>
                            <?php $item_class = ($i == 1) ? 'item active' : 'item'; ?>
                            <div class="<?php echo $item_class; ?>">
                                    <div class="col-md-4 col-sm-6">
                                    <div class="block-text rel zmin">
                                        <a title="" href="#"><?= $reviews->name.' '.$reviews->lastname ?></a>
                                        <div>
                                            <?=
                                            StarRating::widget([
                                                'name' => 'rating',
                                                'value' => $reviews->rating,
                                                'pluginOptions' => [
                                                    'displayOnly' => true,
                                                    'size' => 'xm',
                                                ]
                                            ]);?>
                                        </div>
                                        <div class="mark">
                                            <p>
                                                <?=$reviews->description?>
                                            </p>
                                        </div>
                                        <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                    </div><br>
                                    <div class="person-text rel">
                                        <?= Html::img('@web/uploads/default_user.jpg', [
                                            'alt'=>'default user',
                                            'class'=>'img-circle',
                                            'width'=>'10%',
                                            'height'=>'10%',
                                        ]);?>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    <?php endif;?>
                </div>
                <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
</div>
