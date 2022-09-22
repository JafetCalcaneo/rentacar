<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RenCliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ren-cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cli_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cli_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cli_materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cli_telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cli_fechaNacimiento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
