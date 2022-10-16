<?php

use yii\bootstrap5\Html;
use yii\widgets\ListView;

?>

<?= 

ListView::widget([
    'dataProvider' => $auto,
    'layout' => "<div>{items}</div>",
    'options' => [
        'tag' => 'div',
        'class' => '',
        'id' => '',
    ],
    'itemView' => 'auto-view',

]);

?>
 