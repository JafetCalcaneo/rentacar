<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatEstatus */

$this->title = Yii::t('app', 'Actulizar Estatus: {name}', [
    'name' => $model->est_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estatus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->est_id, 'url' => ['view', 'est_id' => $model->est_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cat-estatus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
