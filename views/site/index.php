<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
use yii\bootstrap5\Carousel;
use yii\helpers\Html;

$this->title = 'RentaCar';
?>
 <div class="site-index">
<div class="banner">
<?= 
        Carousel::widget([
            'items' => [
                // the item contains only the image
                '<img width="1500px" height="450px" src="https://motorsports.com.uy/wp-content/uploads/ibiza_.jpg">',

                // the item contains both the image and the caption
                [
                    'content' => '<img width="1500px" height="450px" src="https://motorsports.com.uy/wp-content/uploads/ibiza_.jpg">',
                   /* 'caption' => '<h4>This is title</h4><p>This is the caption text</p>',*/

                ],
            ]
        ]);
   ?>
</div>


<h1>Tablas y formularios</h1>
<div class="content">
            <a href="../ren-renta/">
                <div class="model-content" id="renta">
                <!-- <?= Html::a(Yii::t('app', 'Renta'), ['./ren-renta'], ['class' => 'btn-model']) ?> -->
                    <div class="model-content-text">
                        <h1>Renta</h1>
                        <p>Formulario para registrar una renta</p>
                    </div>
                </div>
            </a>
            <a href="../ren-cliente/">
                <div class="model-content" id="cliente">
                    <div class="model-content-text">
                        <h1>Cliente</h1>
                        <p>Formulario para registrar un cliente</p>
                    </div>
                </div>            
            </a>
            <a href="../ren-auto">
                <div class="model-content" id="auto">
                    <div class="model-content-text">
                        <h1>Auto</h1>
                        <p>Formulario para actualizar un auto</p>
                    </div>
                </div>
            </a>
            <a href="../ren-modelo/">
                <div class="model-content" id="modelo">
                    <div class="model-content-text">
                        <h1>Modelo</h1>
                        <p>Formulario para registrar un modelo de auto</p>
                    </div>
                </div>
            </a>
            <a href="../ren-empleado/">
                <div class="model-content" id="empleado">
                    <div class="model-content-text">
                        <h1>Empleado</h1>
                        <p>Formulario para registrar un empleado</p>
                    </div>
                </div>
            </a>
            <a href="../cat-metodopago/">
                <div class="model-content" id="metodo">
                    <div class="model-content-text">
                        <h1>Método</h1>
                        <p>Formulario para agregar métodos de pago</p>
                    </div>
                </div>
            </a>
            <a href="../cat-marca/">
                <div class="model-content" id="marca">
                    <div class="model-content-text">
                        <h1>Marca</h1>
                        <p>Formulario para agregar marca</p>
                    </div>
                </div>
            </a>
            <a href="../cat-diasemana/">
                <div class="model-content" id="horario">
                    <div class="model-content-text">
                        <h1>Horario</h1>
                        <p>Formulario para agregar horarios</p>
                    </div>
                </div>
            </a> 
        </div>