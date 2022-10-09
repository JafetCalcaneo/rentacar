<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\CatImagenauto;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CatImagenautoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cat Imagenautos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-imagenauto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cat Imagenauto'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'img_id',
            'img_url:url',
            'img_titulo',
            'img_descripcion',
            'img_seccion',
            'img_estatus',
            'img_href',
            //'img_fkauto',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CatImagenauto $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'img_id' => $model->img_id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>