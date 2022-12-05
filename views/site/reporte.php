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
            <th>Número</th>
            <th>Nombre</th>
            <th>Semestre</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Juan</td>
            <td>3</td>
        </tr>
        <tr>
            <td>2</td>
            <td>María</td>
            <td>6</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Carlos</td>
            <td>2</td>
        </tr>

    </table>
</div>