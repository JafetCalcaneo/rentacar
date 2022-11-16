<!-- <?php

use yii\helpers\Html;
/*
echo '<pre>';
var_dump($model);
echo '</pre>';
*/
?>
<div class="d-flex" id="">
    <a href="<?= $model->img_href ?>">
        <?= Html::img($model->img_url, ['width' => '60%']) ?>
        <h1><?= $model->img_titulo ?></h1>
        <p><?= $model->img_descripcion ?></p>
    </a>
</div>


<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
<?/*php echo '<pre>';
                            var_dump($model->img_url);
                            echo '</pre>'; */ ?> -->