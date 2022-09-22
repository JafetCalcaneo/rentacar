<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CatMarca;
use app\models\CatTransmision;
use app\models\CatCarroceria;

/* @var $this yii\web\View */
/* @var $model app\models\RenModelo */
/* @var $form yii\widgets\ActiveForm */
$marca =ArrayHelper::map(CatMarca::find()->all(), 'mar_id','mar_nombre');
$transimision =ArrayHelper::map(CatTransmision::find()->all(), 'tra_id','tra_nombre');
$carroceria =ArrayHelper::map(CatCarroceria::find()->all(), 'car_id','car_nombre');
?>

<div class="ren-modelo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mod_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mod_anio')->textInput() ?>

    <?= $form->field($model, 'mod_fkmarca')->dropDownList($marca,['prompt' => 'Seleccione una opción']) ?>

    <?= $form->field($model, 'mod_fktransmision')->dropDownList($transimision,['prompt' => 'Seleccione una opción']) ?>

    <?= $form->field($model, 'mod_fkcarroceria')->dropDownList($carroceria,['prompt' => 'Seleccione una opción']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
