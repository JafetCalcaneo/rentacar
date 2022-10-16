<?php

use yii\helpers\Html;

$contenido = <<< HTML
<div class="content-auto">
        <div class="info-auto">
            <img src="{$model->Imagen}" alt="Imagen auto">
            <div class="text">
                <h2>{$model->modNombre}  {$model->anio}</h2>
                <span>{$model->aut_precio} x día</span>
            </div>
        </div>
    </div>
HTML;
?>

<?= Html::a($contenido, ['auto-view', 'id' => $model->aut_id]) ?>
