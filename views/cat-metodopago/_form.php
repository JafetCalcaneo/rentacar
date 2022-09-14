<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\CatMetodopago */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-metodopago-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'met_nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
