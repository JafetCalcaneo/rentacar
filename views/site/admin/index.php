<?php
use yii\bootstrap5\Html;
use yii\widgets\ListView;
?>

<h1>Tablas y formularios</h1>
<?= 
ListView::widget([
    'dataProvider' => $img_dashboard,
    'options' => [
        'class' => 'content',
    ],
    'summary' => false,
    'itemView' => 'dashboard_list',
]);
?>