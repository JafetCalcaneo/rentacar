<?php

use app\widgets\Evento;
use Yii\helpers\Html;
?>


<div class="card shadow  my-2 h-100" style="width: 18rem;">
    <div class="card-body">
        <h2 class="card-title text-center"><?= Yii::t('app', $model->das_titulo); ?></h2>
        <?= Html::a(Html::img("/img/{$model->das_imagen}.png", ['alt' => Yii::t('app', $model->das_titulo), 'class' => 'img-fluid my-3']), $model->das_url)  ?>
        <div class="d-flex justify-content-center">
           
           <?= Evento::widget([
                'url' => $model->das_url,
                'titulo' => 'Ver más...'
            ])
            
            ?>
            <!-- <?// Html::a('Ver mas', $model->das_url, ['class' => 'btn btn-dark']) ?> -->
        </div>
    </div>
</div>