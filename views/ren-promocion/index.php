<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RenPromocionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ren Promocions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-promocion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Ren Promocion'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pro_id',
            'pro_descripcion',
            'pro_imagen',
            'pro_fechaInicio',
            'pro_fechaFinal',
            //'pro_descuento',
            //'pro_fkauto',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RenPromocion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'pro_id' => $model->pro_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
