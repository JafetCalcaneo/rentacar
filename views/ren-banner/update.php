<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenBanner */

$this->title = Yii::t('app', 'Update Ren Banner: {name}', [
    'name' => $model->ban_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ren Banners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ban_id, 'url' => ['view', 'ban_id' => $model->ban_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ren-banner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
