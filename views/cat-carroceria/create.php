<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatCarroceria */

$this->title = Yii::t('app', 'Create Cat Carroceria');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cat Carrocerias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-carroceria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
