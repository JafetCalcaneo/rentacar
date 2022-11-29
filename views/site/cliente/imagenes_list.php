<?php

use yii\helpers\Html;

$items = <<< HTML
<div class="feature-item mb-5 mb-lg-0 card">
			<img src= $model->img_url alt="Servicios" style="width: 296px;
  height: 190px; border-radius: 6px;">
						<div class="feature-icon mb-4">
							<i class="icofont-surgeon-alt"></i>
						</div>
						<span>24 Hours Service</span>
						<h4 class="mb-3">$model->img_titulo</h4>
						<p class="mb-4">$model->img_descripcion</p>
						<!-- <a href="appoinment.html" class="btn btn-main btn-round-full">Make a appoinment</a> -->
					</div>
HTML;
?>  
<?= Html::a($items, ['index'], ['href' => 'https://google.com']) ?>

    