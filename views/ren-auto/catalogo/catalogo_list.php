<?php

use yii\bootstrap5\Html;
use yii\widgets\ListView;

?>

<?= 

ListView::widget([
    'dataProvider' => $auto,
    'options' => [
        'tag' => 'div',
        'class' => 'd-flex',
        'id' => '',
        
    ],
    'summary' => false,
    'itemView' => 'catalogo-item',

]);

?>