<?php

/** @var yii\web\View $this */

use app\models\CatImagenauto;
use yii\bootstrap5\Carousel;
use yii\helpers\Html;
// use yii\bootstrap5\Html;

$this->title = 'RentaCar';
$img = $model->img_url;

?>



<!-- <div class="content"> -->
    <a href="../ren-renta/">
        <div class="model-content" id="renta" style="background: url(<?='/img/'.$model->img_url?>); background-size: 582px 302px;">
            <div class="model-content-text">
                <h1><?=$model->img_titulo?></h1>
                <p><?=$model->img_descripcion?></p>
            </div>
        </div>
    </a>
    