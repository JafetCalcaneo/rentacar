<?php

use yii\bootstrap5\Html;
?>
<div class="card ms-3" style="width: 18rem;">
    <a href="<?= $model->img_href ?>">
        <?= Html::img($model->img_url, ['width' => '286px', 'height' => '140px']) ?>
        <div class="card-body">
            <h1><?= $model->img_titulo ?></h1>
            <p><?= $model->img_descripcion ?></p>
    </a>
</div>
</div>