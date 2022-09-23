<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\CatTransmision;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CatTransmisionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Transmisiónes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-transmision-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Transmisión'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tra_id',
            'tra_nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CatTransmision $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'tra_id' => $model->tra_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
