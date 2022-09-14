<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RenModeloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ren-modelo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'mod_id') ?>

    <?= $form->field($model, 'mod_nombre') ?>

    <?= $form->field($model, 'mod_anio') ?>

    <?= $form->field($model, 'mod_fkmarca') ?>

    <?= $form->field($model, 'mod_fktransmision') ?>

    <?php // echo $form->field($model, 'mod_fkcarroceria') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
