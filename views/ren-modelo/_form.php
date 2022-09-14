<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RenModelo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ren-modelo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mod_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mod_anio')->textInput() ?>

    <?= $form->field($model, 'mod_fkmarca')->textInput() ?>

    <?= $form->field($model, 'mod_fktransmision')->textInput() ?>

    <?= $form->field($model, 'mod_fkcarroceria')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
