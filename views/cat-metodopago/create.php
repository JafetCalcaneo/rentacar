<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatMetodopago */

$this->title = Yii::t('app', 'Crear Métodos de pago');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cat Metodopagos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-metodopago-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
