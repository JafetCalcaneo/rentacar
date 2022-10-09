<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\RenBanner;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RenBannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ren Banners');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-banner-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Ren Banner'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ban_id',
            'ban_url:url',
            'ban_descripcion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RenBanner $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ban_id' => $model->ban_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
