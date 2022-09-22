<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatMetodopago */

$this->title = Yii::t('app', 'Actualizar Método de Pago: {name}', [
    'name' => $model->met_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Método de Pago'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->met_id, 'url' => ['view', 'met_id' => $model->met_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cat-metodopago-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
