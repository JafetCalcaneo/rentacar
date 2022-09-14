<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RenHorarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ren-horario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'hor_id') ?>

    <?= $form->field($model, 'hor_horaInicio') ?>

    <?= $form->field($model, 'hor_horaCierre') ?>

    <?= $form->field($model, 'hor_estatus') ?>

    <?= $form->field($model, 'hor_fkdiaSemana') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
