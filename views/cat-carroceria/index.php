<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\CatCarroceria;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CatCarroceriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cat Carrocerias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-carroceria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cat Carroceria'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'car_id',
            'car_nombre',
            'car_asientos',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CatCarroceria $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'car_id' => $model->car_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
