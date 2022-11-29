<?php

use app\models\CatMetodopago;
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
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

$form = ActiveForm::begin();

//  $form->field($renta, 'ren_fkmetodoPago')->dropdownList(CatMetodopago::map(), ['prompt' => 'Seleccione el método de pago']);
 

ActiveForm::end();


?>
 