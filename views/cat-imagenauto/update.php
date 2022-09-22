<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatImagenauto */

$this->title = Yii::t('app', 'Actualizar Imagen: {name}', [
    'name' => $model->img_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Imágenes de Autos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->img_id, 'url' => ['view', 'img_id' => $model->img_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cat-imagenauto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
