<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenHorario */

$this->title = Yii::t('app', 'Update Ren Horario: {name}', [
    'name' => $model->hor_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ren Horarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hor_id, 'url' => ['view', 'hor_id' => $model->hor_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ren-horario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
