<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\RenRenta;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RenRentaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Rentas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-renta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Renta'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ren_id',
            'ren_fechaPago',
            'ren_fechaInicio',
            'ren_fechaFinal',
            'ren_fechaEntregado',
            'ren_monto',
            'ren_promocion',
            'ren_fkmetodoPago',
            'ren_fkcliente',
            'ren_fkauto',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RenRenta $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ren_id' => $model->ren_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
