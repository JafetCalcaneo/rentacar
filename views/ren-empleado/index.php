<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\RenEmpleado;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RenEmpleadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empleados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-empleado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Empleado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'emp_id',
            'emp_nombre',
            'emp_paterno',
            'emp_materno',
            'emp_cargo',
            //'emp_fkuser',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RenEmpleado $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'emp_id' => $model->emp_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
