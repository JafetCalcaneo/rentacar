<?php

use yii\bootstrap5\Html;
?>


<div class="image-port">
             <figure>
             <?= Html::img($model->img_url, ['width' => '286px', 'height' => '140px']) ?>
               <div class="capa">
                 <h3><?= $model->img_titulo?></h3>
               </div>
             </figure>             
            </div>