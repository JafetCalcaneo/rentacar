<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="principal">
    <div class="car-image">
        <img src=<?= $model->Imagen ?> alt="Auto banner">
    </div>
    <div class="info">
        <div class="car-info">
            <div>
                <h1><?= $model->modNombre ?></h1>
            </div>
            <div> $<?= $model->aut_precio ?><strong>por día</strong></div>
            <div class="info-seccion">
                <?= Html::img(Url::to('@web/img/iconos/cocheIcon.png'), ['alt' => 'Icono coche']) ?>
                <div><span>Sedán</span></div>
            </div>
            <div class="info-seccion">
            <?= Html::img(Url::to('@web/img/iconos/palancaIcon.png'), ['alt' => 'Icono coche']) ?>
                <div><span><?= $model->transmision ?></span></div>
            </div>
        </div>

        <div class="inputs">
            <form action="">
                <span>Fecha de recogida</span>
                <input type="date">
                <span>Fecha de entrega</span>
                <input type="date">
                <span>Total a pagar: $1000</span>
                <input id="input-rent" type="submit">
            </form>

        </div>
    </div>
</div>