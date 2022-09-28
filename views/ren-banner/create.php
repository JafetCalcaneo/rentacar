<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RenBanner */

$this->title = Yii::t('app', 'Create Ren Banner');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ren Banners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-banner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
