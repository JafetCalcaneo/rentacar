<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Carousel;
use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'RentaCar';
?>



<!-- <?= Html::a(Yii::t('app', 'Renta'), ['./ren-renta'], ['class' => 'btn-model']) ?> -->

<h1 class="text-center my-4">Tablas</h1>
<?php
$botones = [
    (object) ['ruta' => '../ren-renta/', 'id' => 'renta', 'titulo' => 'Renta', 'descripcion' => 'Formulario para registrar una renta'],
    (object) ['ruta' => '../ren-cliente/', 'id' => 'cliente', 'titulo' => 'Cliente', 'descripcion' => 'Formulario para registrar un cliente'],
];
?>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        'tag' => 'div',
        //'class' => 'row justify-content-evenly',
        'id' => 'listarBotonera',
        'class' => 'row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 justify-content-evenly'

    ],
    'itemOptions' => ['tag' => null],

    'layout' => "{items}",
    'itemView' => '_card',
]); ?>

