<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RenAuto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ren-auto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'aut_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aut_precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aut_fkmodelo')->textInput() ?>

    <?= $form->field($model, 'aut_fkestatus')->textInput() ?>

    <?= $form->field($model, 'aut_fkimagen')->textInput() ?>
    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
