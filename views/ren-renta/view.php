<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RenRenta */

$this->title = $model->ren_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ren Rentas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ren-renta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'ren_id' => $model->ren_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'ren_id' => $model->ren_id], [
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
            'ren_id',
            'ren_fechaPago',
            'ren_fechaInicio',
            'ren_fechaFinal',
            'ren_fechaEntregado',
            'ren_monto',
            'ren_promocion',
            'ren_fkmetodoPago',
            'ren_fkcliente',
            'ren_fkauto',
        ],
    ]) ?>

</div>
