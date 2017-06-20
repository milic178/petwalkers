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

$this -> title = Yii::t('app','Show reviews');
?>


<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <?php
            foreach ($model as $reviews):
            ?>
            <?php echo Carousel::widget(
                ['items' => [
                    ['content' => $reviews->name.''.$reviews->lastname,
                        'caption' => $reviews->description,
                        'options' => ['interval' => '100']
                    ]
                ]
                ]); ?>
            <?php
            endforeach;
                ?>
        </div>
    </div>
</div>




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
                                <a title="" href="#"><?= $reviews->name.' '.$reviews->lastname ?></a>
                                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>  </span></div>
                                <p><?=$reviews->description?></p>
                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                            </div>
                            <div class="person-text rel">
                                <img src=""/>
                                <a title="" href="#">Anna</a>
                                <i>from Glasgow, Scotland</i>
                            </div>
                        </div>
                        <?php endforeach; ?>
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