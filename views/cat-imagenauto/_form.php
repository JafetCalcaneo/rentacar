<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatImagenauto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-imagenauto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'img_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img_titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img_descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img_seccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img_estatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img_href')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'img_fkauto')->textInput() ?> -->
    


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>