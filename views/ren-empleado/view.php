<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RenEmpleado */

$this->title = $model->emp_id;
$this->params['breadcrumbs'][] = ['label' => 'Ren Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ren-empleado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'emp_id' => $model->emp_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'emp_id' => $model->emp_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'emp_id',
            'emp_nombre',
            'emp_paterno',
            'emp_materno',
            'emp_cargo',
            'emp_fkuser',
        ],
    ]) ?>

</div>
