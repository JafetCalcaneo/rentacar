<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Carroceria */

$this->title = Yii::t('app', 'Update Carroceria: {name}', [
    'name' => $model->car_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Carrocerias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->car_id, 'url' => ['view', 'car_id' => $model->car_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="carroceria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
