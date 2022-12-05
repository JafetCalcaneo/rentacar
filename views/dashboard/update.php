<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Dashboard $model */

$this->title = Yii::t('app', 'Update Dashboard: {name}', [
    'name' => $model->das_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashboards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->das_id, 'url' => ['view', 'das_id' => $model->das_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="dashboard-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
