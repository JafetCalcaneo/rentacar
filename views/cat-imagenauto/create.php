<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatImagenauto */

$this->title = Yii::t('app', 'Create Cat Imagenauto');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cat Imagenautos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-imagenauto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
