<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenRenta */

$this->title = Yii::t('app', 'Crear Renta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ren Rentas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-renta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
