<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatTransmision */

$this->title = Yii::t('app', 'Transmisión');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transmisión'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-transmision-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
