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
        <h2>Carousel Reviews</h2>
    </div>
</div>
<div class="carousel-reviews broun-block">
    <div class="container">
        <div class="row">
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="item active">
                        <?php foreach ($model as $reviews): ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="block-text rel zmin">
                                <a><?= $reviews->name.' '.$reviews->lastname ?></a>
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
                                <div class="mark"></div>
                                <p><?=$reviews->description?></p>
                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                            </div>
                            <br>
                            <div class="person-text rel">
                                <?= Html::img('@web/uploads/default_user.jpg', [
                                    'alt'=>'default user',
                                    'class'=>'img-circle',
                                    'width'=>'10%',
                                    'height'=>'10%',
                                ]);?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
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