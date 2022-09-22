<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\RenModelo;
use app\models\CatEstatus;
/* @var $this yii\web\View */
/* @var $model app\models\RenAuto */
/* @var $form yii\widgets\ActiveForm */

$modelo =ArrayHelper::map(RenModelo::find()->all(), 'mod_id','mod_nombre');
$estatus =ArrayHelper::map(CatEstatus::find()->all(), 'est_id','est_nombre');

?>

<div class="ren-auto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'aut_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aut_precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aut_fkmodelo')->dropDownList($modelo,['prompt' => 'Seleccione una opción']) ?>

    <?= $form->field($model, 'aut_fkestatus')->dropDownList($estatus,['prompt' => 'Seleccione una opción']) ?>

    <?= $form->field($model, 'aut_fkimagen')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
