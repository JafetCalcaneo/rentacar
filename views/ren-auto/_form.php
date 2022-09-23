<?php

use app\models\CatEstatus;
use app\models\RenAuto;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use app\models\RenModelo;

/* @var $this yii\web\View */
/* @var $model app\models\RenAuto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ren-auto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'aut_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aut_precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aut_fkmodelo')->dropdownList(RenModelo::map(), ['prompt' => 'Seleccione un auto']) ?>

    <?= $form->field($model, 'aut_fkestatus')->dropDownList(CatEstatus::map(), ['prompt' => 'Seleccione el estatus']) ?>

    <?= $form->field($model, 'aut_fkimagen')->Input('file') ?>
    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
