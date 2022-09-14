<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RenPromocionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ren-promocion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'pro_id') ?>

    <?= $form->field($model, 'pro_descripcion') ?>

    <?= $form->field($model, 'pro_imagen') ?>

    <?= $form->field($model, 'pro_fechaInicio') ?>

    <?= $form->field($model, 'pro_fechaFinal') ?>

    <?php // echo $form->field($model, 'pro_descuento') ?>

    <?php // echo $form->field($model, 'pro_fkauto') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
