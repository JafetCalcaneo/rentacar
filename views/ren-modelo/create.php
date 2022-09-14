<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenModelo */

$this->title = Yii::t('app', 'Create Ren Modelo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ren Modelos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-modelo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
