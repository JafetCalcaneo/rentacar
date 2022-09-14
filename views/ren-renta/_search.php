<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RenRentaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ren-renta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ren_id') ?>

    <?= $form->field($model, 'ren_fechaPago') ?>

    <?= $form->field($model, 'ren_fechaInicio') ?>

    <?= $form->field($model, 'ren_fechaFinal') ?>

    <?= $form->field($model, 'ren_fechaEntregado') ?>

    <?php // echo $form->field($model, 'ren_monto') ?>

    <?php // echo $form->field($model, 'ren_promocion') ?>

    <?php // echo $form->field($model, 'ren_fkmetodoPago') ?>

    <?php // echo $form->field($model, 'ren_fkcliente') ?>

    <?php // echo $form->field($model, 'ren_fkauto') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
