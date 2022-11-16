<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use kartik\icons\Icon;
use kartik\file\FileInput;
use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Html as ReportHtml;
use webvimark\modules\UserManagement\models\rbacDB\Role;
use yii\bootstrap5\Html as Bootstrap5Html;

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
                        'allowedFileExtensions' => ['png','jpg'],
                        'showUpload' => false,
                        'showRemove' => false,
                        'initialPreview' => [$model->archivo_imagen],
                        'initialPreviewAsData' => true,
                        'initialCaption' => Yii::t('app', 'Imagen del botón: ' . $model->archivo_imagen),
                        'overwriteInitial' => false,
                    ],
                ]) ?>
            </div>
            <div class="col-md-2">
                
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'img_estatus')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                        'onText' => Yii::t('app', 'Disponible'),
                        'offText' => Yii::t('app', 'Ocupado'),
                    ]
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'img_titulo')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'img_url')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
            <?= $form->field($model, 'img_descripcion')->textInput(['maxlength' => true]) ?>
            </div>
            
        </div>
        <?= $form->field($model, 'img_seccion')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'img_href')->textInput(['maxlength' => true]) ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => 'width: 60%;']) ?>
        </div>
    </center>
    <?php ActiveForm::end(); ?>
</div>