<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\RenAuto;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RenAutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Autos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-auto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Agregar Auto'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'aut_id',
            'aut_color',
            'aut_precio',
            'aut_fkmodelo',
            'aut_fkestatus',
            //'aut_fkimagen',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RenAuto $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'aut_id' => $model->aut_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
