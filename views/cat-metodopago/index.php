<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\CatMetodopago;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CatMetodopagoSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cat Metodopagos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-metodopago-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cat Metodopago'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'met_id',
            'met_nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CatMetodopago $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'met_id' => $model->met_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
