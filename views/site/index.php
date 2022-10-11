<?php

use yii\widgets\ListView;
use yii\bootstrap5\Carousel;
?>

<div class="banner">
    <?= Carousel::widget([
        'items' => $items
    ]) ?>
</div>


<h1>NUESTROS SERVICIOS</h1>
<br>

<!-- <div class="d-flex"> -->
    <?= ListView::widget([
        'dataProvider' => $servicios,
        // 'layout' => "<div class='d-flex'>{items}</div>", 
        'options' => [
            'tag' => 'div',
            'class' => 'servicios-content',
            // 'id' => 'list-wrapper',
        ],
        'itemView' => '/cat-imagenauto/imagenes_list',
    ]); ?>
<!-- </div> -->