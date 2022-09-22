<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatMetodopago */

$this->title = Yii::t('app', 'Crear Método de Pago');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Método de Pago'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-metodopago-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
