<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RenModelo */

$this->title = $model->mod_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ren Modelos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ren-modelo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'mod_id' => $model->mod_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'mod_id' => $model->mod_id], [
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
            'mod_id',
            'mod_nombre',
            'mod_anio',
            'mod_fkmarca',
            'mod_fktransmision',
            'mod_fkcarroceria',
        ],
    ]) ?>

</div>
