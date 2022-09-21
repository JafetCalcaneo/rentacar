<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\RenRenta */
/* @var $form yii\widgets\ActiveForm */
use app\models\RenRenta;
?>

<div class="ren-renta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ren_fechaPago')->input('date') ?>

    <?= $form->field($model, 'ren_fechaInicio')->input('date') ?>

    <?= $form->field($model, 'ren_fechaFinal')->input('date') ?>

    <?= $form->field($model, 'ren_fechaEntregado')->input('date') ?>

    <?= $form->field($model, 'ren_monto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ren_promocion')->textInput() ?>

    <?= $form->field($model, 'ren_fkmetodoPago')->textInput() ?>

    <?= $form->field($model, 'ren_fkcliente')->textInput() ?>

    <?= $form->field($model, 'ren_fkauto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
