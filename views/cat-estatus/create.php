<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatEstatus */

$this->title = Yii::t('app', 'Create Cat Estatus');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cat Estatuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-estatus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
