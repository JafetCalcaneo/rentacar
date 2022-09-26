<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Carousel;
use yii\helpers\Html;

$this->title = 'RentaCar';
?>
 <!-- <div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

        <?= Html::a(Yii::t('app', 'Modelos'), ['/ren-modelo'], ['class' => 'btn btn-success']) ?>
                
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div> -->
<div class="banner">
<?= 
        Carousel::widget([
            'items' => [
                // the item contains only the image
                '<img src="../.././web./img/modelo2.jpg"/>',
                
                // the item contains both the image and the caption
                [
                    'content' => '<img src="http://rentacar.test/web/img/modelo2.jpg">',
                    'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
                    
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