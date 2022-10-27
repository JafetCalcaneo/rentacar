<?php

use yii\widgets\ListView;
use yii\bootstrap5\Carousel;
?>
<div class="banner-flex">
    <?= Carousel::widget([
        'items' => $items,
        'options' => ['class' => 'banner'],
    ]) ?>
</div>

<h1>Nuestros servicios</h1>
<br>
    <?= ListView::widget([
        'dataProvider' => $servicios,
        // 'layout' => "<div class='d-flex'>{items}</div>", 
        'options' => [
            // 'tag' => 'div',
            'class' => 'servicios-content',
            // 'id' => 'list-wrapper',
        ],
        'itemView' => '/cat-imagenauto/imagenes_list',
        'summary' => false,
    ]); ?>
