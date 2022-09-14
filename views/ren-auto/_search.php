<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RenAutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ren-auto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'aut_id') ?>

    <?= $form->field($model, 'aut_color') ?>

    <?= $form->field($model, 'aut_precio') ?>

    <?= $form->field($model, 'aut_fkmodelo') ?>

    <?= $form->field($model, 'aut_fkestatus') ?>

    <?php // echo $form->field($model, 'aut_fkimagen') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
