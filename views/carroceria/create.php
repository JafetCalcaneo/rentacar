<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Carroceria */

$this->title = Yii::t('app', 'Create Carroceria');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Carrocerias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carroceria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
