<?php

use Yii;
use yii\helpers\Html;
use kartik\icons\Icon;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\bootstrap5\ActiveForm;
use kartik\switchinput\SwitchInput;
use webvimark\modules\UserManagement\models\rbacDB\Role;
// use kartik\icons;

// Icon::map($this);
/* @var $this yii\web\View */
/* @var $model app\models\Dashboard */
/* @var $form yii\widgets\ActiveForm */

?>


<div class="dashboard-form">
    <center>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'archivo_imagen')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'allowedFileExtensions' => ['png'],
                        'showUpload' => false,
                        'showRemove' => false,
                        'initialPreview' => [$model->archivo_imagen],
                        'initialPreviewAsData' => true,
                        'initialCaption' => Yii::t('app', 'Imagen del botón: ') . $model->archivo_imagen,
                        'overwriteInitial' => false,
                    ],
                ]) ?>
            </div>

            <div class="col-md-2">
                <?= $form->field($model, 'das_orden')->textInput() ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'das_estatus')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                        'onText' => Yii::t('app', 'Activo'),
                        'offText' => Yii::t('app', 'Inactivo'),
                    ]
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'das_titulo')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'das_url')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'das_imagen')->textInput() ?>
            </div>
            <div class="col-md-8">
                <?= $form->field($model, 'lista_roles')->widget(Select2::classname(), [
                    'data' => Role::getAvailableRoles(true, true),
                    'options' => ['placeholder' => Yii::t('app', 'Selecciona los roles...')],
                    'pluginOptions' => ['allowClear' => true, 'multiple' => true],
                ]) ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => 'width: 60%;']) ?>
        </div>
    </center>
    <?php ActiveForm::end(); ?>
</div>