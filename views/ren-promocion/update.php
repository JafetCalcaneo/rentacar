<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenPromocion */

$this->title = Yii::t('app', 'Update Ren Promocion: {name}', [
    'name' => $model->pro_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ren Promocions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pro_id, 'url' => ['view', 'pro_id' => $model->pro_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ren-promocion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
