<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatDiasemana */

$this->title = Yii::t('app', 'Update Cat Diasemana: {name}', [
    'name' => $model->sem_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cat Diasemanas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sem_id, 'url' => ['view', 'sem_id' => $model->sem_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cat-diasemana-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
