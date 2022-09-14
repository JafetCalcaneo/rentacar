<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\RenModelo;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RenModeloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ren Modelos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-modelo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Ren Modelo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mod_id',
            'mod_nombre',
            'mod_anio',
            'mod_fkmarca',
            'mod_fktransmision',
            //'mod_fkcarroceria',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RenModelo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'mod_id' => $model->mod_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
