<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RenAuto */

$this->title = $model->aut_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ren Autos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ren-auto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'aut_id' => $model->aut_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'aut_id' => $model->aut_id], [
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
            'aut_id',
            'aut_color',
            'aut_precio',
            'aut_fkmodelo',
            'aut_fkestatus',
            'aut_fkimagen',
        ],
    ]) ?>

</div>
