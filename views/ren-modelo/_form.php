<?php

use app\models\CatCarroceria;
use app\models\CatMarca;
use app\models\CatTransmision;
use app\models\RenModelo;
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

    <?= $form->field($model, 'mod_fkmarca')->dropDownList(CatMarca::map(), ['prompt' => 'Seleccione la marca']) ?>

    <?= $form->field($model, 'mod_fktransmision')->dropDownList(CatTransmision::mapTrans(), ['prompt' => 'Seleccione la transmisión']) ?>

    <?= $form->field($model, 'mod_fkcarroceria')->dropDownList(CatCarroceria::map(), ['prompt' => 'Seleccione la carroceria']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
