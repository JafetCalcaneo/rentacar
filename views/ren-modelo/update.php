<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenModelo */

$this->title = Yii::t('app', 'Update Ren Modelo: {name}', [
    'name' => $model->mod_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ren Modelos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mod_id, 'url' => ['view', 'mod_id' => $model->mod_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ren-modelo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
