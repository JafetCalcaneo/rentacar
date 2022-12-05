<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CatImagenauto */

$this->title = $model->img_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cat Imagenautos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cat-imagenauto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'img_id' => $model->img_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'img_id' => $model->img_id], [
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
            'img_id',
            'img_url:url',
            'img_titulo',
            'img_descripcion',
            'img_seccion',
            'img_estatus',
            'img_href',
            'img_fkauto',
        ],
    ]) ?>

</div>