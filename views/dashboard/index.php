<?php

use app\models\Dashboard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\DashboardSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Dashboards');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Dashboard'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    <!-- '<center><img src="/img/'.$model->das_imagen.'.png" alt=""> <br>{$model->das_titulo}</center'; -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'das_id',
            'das_orden',
            [
                'attribute' => 'das_imagen',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::img("/img/{$model->das_imagen}.png", ['alt' => Yii::t('app', $model->das_titulo), 'class' => 'img-fluid']);
                }
            ],
            'das_titulo',
            'das_url',
            [
                'attribute' => 'das_estatus',
                'format' => 'raw',
                'value' => function ($model) {
                    $nombreEstatus = $model->das_estatus == 1 ? Html::a('Activo', 'javascritp:void(0)', ['class' => 'btn btn-success'])
                        : '<a class="btn btn-danger"> Inactivo</a>';
                    return $nombreEstatus;
                }
            ],
            'das_roles',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Dashboard $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'das_id' => $model->das_id]);
                },
                'contentOptions' => ['style' => 'width: 20px;']
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>