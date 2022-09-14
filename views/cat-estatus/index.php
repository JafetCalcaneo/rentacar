<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\CatEstatus;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CatEstatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cat Estatuses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-estatus-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cat Estatus'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'est_id',
            'est_nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CatEstatus $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'est_id' => $model->est_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
