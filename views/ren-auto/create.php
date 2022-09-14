<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenAuto */

$this->title = Yii::t('app', 'Create Ren Auto');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ren Autos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-auto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
