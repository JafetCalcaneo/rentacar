<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenPromocion */

$this->title = Yii::t('app', 'Create Ren Promocion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ren Promocions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-promocion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
