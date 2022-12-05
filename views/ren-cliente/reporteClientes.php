<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $titulo;
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="text-align: center;">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Este es el reporte de clientes</p>
    <table border="1" style="margin: 0 auto;">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Teléfono</th>
        </tr>
        <?php foreach ($clientes as $cli => $cliente) : ?>
            <tr>
                <td><?= $cli+1 ?></td>
                <td><?= $cliente->nombre ?></td>
                <td><?= $cliente->cli_telefono ?></td>
            </tr>
        <?php endforeach ?>

    </table>
</div>