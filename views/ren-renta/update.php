<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenRenta */

$this->title = Yii::t('app', 'Actualizar Renta: {name}', [
    'name' => $model->ren_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rentas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ren_id, 'url' => ['view', 'ren_id' => $model->ren_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ren-renta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
