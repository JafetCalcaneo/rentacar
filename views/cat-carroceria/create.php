<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatCarroceria */

$this->title = Yii::t('app', 'Carrocería');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Carrocería'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-carroceria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
