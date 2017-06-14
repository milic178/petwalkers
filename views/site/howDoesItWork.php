<?php
/**
 * Created by PhpStorm.
 * User: Milic_lenovo
 * Date: 19.5.2017
 * Time: 22:29
 */

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = Yii::t('app','How does it work?');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Displaying modal form for entering review code and rating user -->
<div>
    <?php
    Modal::begin([
        'header' => '<h3>'.Yii::t('app','Rate walker').'</h3>',
        'id'=>'enter-code',
        'size'=>'modal-sm',
    ]);
    echo "<div id='modalFormContent'></div>";
    Modal::end();
    ?>
</div>


<!-- Content Row -->
<div class="row">
    <div class="col-lg-12 result_box">
        <p>Most of Start Bootstrap's unstyled templates can be directly integrated into the Modern Business template. You can view all of our unstyled templates on our website at <a href="http://startbootstrap.com/template-categories/unstyled">http://startbootstrap.com/template-categories/unstyled</a>.
        </p>
            <?= Html::img(\Yii::$app->params['uploadUrl'].'how.png',[
                'alt'=>'some',
                'class'=>'img-responsive center-block'
            ]);?>
    </div>
</div>
<!-- /.row -->

