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

$this->title = Yii::t('app', 'Imágenes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-imagenauto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Imagen'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'img_id',
            // 'img_url:url',
            // 'img_titulo',
            // 'img_descripcion',
            // 'img_seccion',
            // 'img_estatus',
            // 'img_href',
            // //'img_fkauto',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, CatImagenauto $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'img_id' => $model->img_id]);
            //     }
            // ],
            'img_id',
            [
                'attribute' => 'img_imagen',
                'format' => 'raw',
                'value' => function ($model) {
                    
                    if($model->img_seccion == "Autos"){
                    return "<img src={$model->img_url}></img>";

                    }elseif($model->img_seccion == "Servicios"){
                    return "<img src={$model->img_url}></img>";

                    }elseif($model->img_seccion == "Iconos"){
                        return "<img src={$model->img_url}></img>";

                    }elseif($model->img_seccion =="Prueba"){
                        return "<img src={$model->img_url}></img>";
                    };

                    return "<img src=/img/{$model->img_url}></img>";
                }
            ],
            'img_titulo',
            'img_descripcion',
            'img_url',
            [
                'attribute' => 'img_estatus',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->img_estatus;
                }
            ],
            'img_seccion',
            'img_href',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CatImagenauto $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'img_id' => $model->img_id]);
                },
                'contentOptions' => ['style' => 'width: 80px;']
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>