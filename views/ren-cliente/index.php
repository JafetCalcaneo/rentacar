<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\RenCliente;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RenClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ren Clientes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ren-cliente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Ren Cliente'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cli_id',
            'cli_nombre',
            'cli_paterno',
            'cli_materno',
            'cli_telefono',
            //'cli_fechaNacimiento',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RenCliente $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'cli_id' => $model->cli_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
