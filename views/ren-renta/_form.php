<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Carousel;
/* @var $this yii\web\View */
/* @var $model app\models\RenRenta */
/* @var $form yii\widgets\ActiveForm */
use app\models\RenRenta;
use app\models\CatMetodopago;
use app\models\RenModelo;
// use app\widgets\Carousel;
?>

<div class="ren-renta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ren_fechaPago')->input('date') ?>

    <?= $form->field($model, 'ren_fechaInicio')->input('date') ?>

    <?= $form->field($model, 'ren_fechaFinal')->input('date') ?>

    <?= $form->field($model, 'ren_fechaEntregado')->input('date') ?>

    <?= $form->field($model, 'ren_monto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ren_promocion')->textInput() ?>

    <?= $form->field($model, 'ren_fkmetodoPago')->dropdownList(CatMetodopago::map(), ['prompt' => 'Seleccione el método de pago']) ?>

    <?= $form->field($model, 'ren_fkcliente')->textInput() ?>

    <?= $form->field($model, 'ren_fkauto')->dropDownList(RenModelo::map(), ['prompt' => 'Seleccione el auto']) ?>
   <?= 
        Carousel::widget([
            'items' => [
                // the item contains only the image
                '<img src="web/img/Utah.jpg"/>',
                
                // the item contains both the image and the caption
                [
                    'content' => '<img src="C:/WinNMP/WWW/rentacar/web/images/zoe.jfif"/>',
                    'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
                    
                ],
            ]
        ]);
   ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
