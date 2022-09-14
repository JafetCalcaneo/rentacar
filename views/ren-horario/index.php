<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RenHorarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ren Horarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-horario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Ren Horario'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'hor_id',
            'hor_horaInicio',
            'hor_horaCierre',
            'hor_estatus',
            'hor_fkdiaSemana',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RenHorario $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'hor_id' => $model->hor_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
