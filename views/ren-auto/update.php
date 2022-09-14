<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenAuto */

$this->title = Yii::t('app', 'Update Ren Auto: {name}', [
    'name' => $model->aut_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ren Autos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->aut_id, 'url' => ['view', 'aut_id' => $model->aut_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ren-auto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
