<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\CatDiasemana;
/* @var $this yii\web\View */
/* @var $model app\models\RenHorario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ren-horario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hor_horaInicio')->input('time') ?>

    <?= $form->field($model, 'hor_horaCierre')->input('time') ?>

    <?= $form->field($model, 'hor_estatus')->textInput() ?>
    
    <?= $form->field($model, 'hor_fkdiaSemana')->dropDownList(CatDiasemana::map(), ['prompt'=>'Selecciona el día de la semana']) ?> 
   

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
