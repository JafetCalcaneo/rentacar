<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Transmision */

$this->title = Yii::t('app', 'Update Transmision: {name}', [
    'name' => $model->tra_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transmisions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tra_id, 'url' => ['view', 'tra_id' => $model->tra_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="transmision-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
