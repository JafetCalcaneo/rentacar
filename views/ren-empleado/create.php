<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenEmpleado */

$this->title = 'Create Ren Empleado';
$this->params['breadcrumbs'][] = ['label' => 'Ren Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-empleado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
