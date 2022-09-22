<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RenPromocion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ren-promocion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pro_descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_fechaInicio')->textInput() ?>

    <?= $form->field($model, 'pro_fechaFinal')->textInput() ?>

    <?= $form->field($model, 'pro_descuento')->textInput() ?>

    <?= $form->field($model, 'pro_fkauto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
