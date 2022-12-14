<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatCarroceria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-carroceria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'car_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_asientos')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
