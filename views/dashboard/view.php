<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Dashboard $model */

$this->title = $model->das_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashboards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dashboard-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'das_id' => $model->das_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'das_id' => $model->das_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'das_id',
            'das_orden',
            [
                'attribute' => 'das_imagen',
                'format' => 'raw',
                'value' => function ($model) {
                    return "{$model->das_titulo}<br><img src='/img/{$model->das_imagen}.png' width='50'>";
                }
            ],
            'das_titulo',
            'das_url',
            [
                'attribute' => 'das_estatus',
                'format' => 'raw',
                'value' => function ($model) {
                    $nombreEstatus = $model->das_estatus == 1 ? Html::a('Activo','javascritp:void(0)',['class' => 'btn btn-success'])
                    : '<a class="btn btn-danger"> Inactivo</a>';
                    return "<div style='width: 30%;'>{$nombreEstatus}</div>";
                }
            ],
            'das_roles',
        ],
    ]) ?>

</div>