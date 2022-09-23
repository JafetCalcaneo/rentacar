<?php

use app\models\CatTransmision;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

//  @var $this yii\web\View ;
//  @var $model app\models\CatTransmision ;
//  @var $form yii\widgets\ActiveForm ;
?>

<div class="cat-transmision-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tra_nombre')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
