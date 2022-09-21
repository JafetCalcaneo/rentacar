<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RenEmpleado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ren-empleado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'emp_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emp_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emp_materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emp_cargo')->textInput() ?>

    <?= $form->field($model, 'emp_fkuser')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
