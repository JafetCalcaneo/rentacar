<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RenHorario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ren-horario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hor_horaInicio')->textInput() ?>

    <?= $form->field($model, 'hor_horaCierre')->textInput() ?>

    <?= $form->field($model, 'hor_estatus')->textInput() ?>

    <?= $form->field($model, 'hor_fkdiaSemana')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
