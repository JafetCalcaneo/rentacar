<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenCliente */

$this->title = Yii::t('app', 'Actualizar Cliente: {name}', [
    'name' => $model->cli_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cli_id, 'url' => ['view', 'cli_id' => $model->cli_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ren-cliente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
