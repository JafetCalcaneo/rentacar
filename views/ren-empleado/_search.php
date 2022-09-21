<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RenEmpleadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ren-empleado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'emp_id') ?>

    <?= $form->field($model, 'emp_nombre') ?>

    <?= $form->field($model, 'emp_paterno') ?>

    <?= $form->field($model, 'emp_materno') ?>

    <?= $form->field($model, 'emp_cargo') ?>

    <?php // echo $form->field($model, 'emp_fkuser') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
