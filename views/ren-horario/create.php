<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenHorario */

$this->title = Yii::t('app', 'Crear Horarios');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ren Horarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-horario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    

</div>
