<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenEmpleado */

$this->title = 'Update Ren Empleado: ' . $model->emp_id;
$this->params['breadcrumbs'][] = ['label' => 'Ren Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->emp_id, 'url' => ['view', 'emp_id' => $model->emp_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ren-empleado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
