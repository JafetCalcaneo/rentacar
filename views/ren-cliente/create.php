<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenCliente */

$this->title = Yii::t('app', 'Clientes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-cliente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
