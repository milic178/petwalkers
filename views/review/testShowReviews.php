<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 26.6.2017
 * Time: 14:31
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Carousel;
use kartik\rating\StarRating;

?>

<div class="carousel-reviews broun-block">
    <div class="container">
        <div class="row">
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
<!-- Carousel inner-->
                <div class="carousel-inner">
<!-- Active item -->
<!-- if user has no reviews -->
                    <?php if($model == false):?>
                        <div class="item active">
                            <div class="col-md-6 col-sm-6">
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
                    <div class="item active">
                        <?php
                        $i=1;
                        foreach ($model as $reviews){

                            if($i%3==0) {
                                echo '</div><div class="item">';
                            }
                            ?>
                            <!--code to output the images -->
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

                            <?php $i++; } ?>
                    </div>
                    <!--END OF item -->
<!-- END OF Carousel inner-->
                </div>
                <?php endif;?>
<!-- Carousel indicators left and right-->
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


