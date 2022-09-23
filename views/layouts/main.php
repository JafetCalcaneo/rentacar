<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    $default = Yii::$app->session->get('language', 'en-US');
    $language = $default == 'en-US' ? 'es-INGLES' : 'en-US';
    $bandera = Yii::$app->params['languages'][$language];

    echo Nav::widget([
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            
            ['label' => 'Home', 'url' => ['/site/index']],
            [
                'label' => 'Renta',
                'items' => [
                     ['label' => 'Index', 'url' => '/ren-renta/index'],
                     ['label' => 'Crear', 'url' => '/ren-renta/create'],
                ],
            ],
            [
                'label' => 'Auto',
                'items' => [
                     ['label' => 'Index', 'url' => '/ren-auto/index'],
                     ['label' => 'Crear', 'url' => '/ren-auto/create'],
                ],
            ],
            [
                'label' => 'Cliente',
                'items' => [
                     ['label' => 'Index', 'url' => '/ren-cliente/index'],
                     ['label' => 'Crear', 'url' => '/ren-cliente/create'],
                ],
            ],
            [
                'label' => 'Método de pago',
                'items' => [
                     ['label' => 'Index', 'url' => '/cat-metodopago/index'],
                     ['label' => 'Crear', 'url' => '/cat-metodopago/create'],
                ],
            ],
            [
                'label' => 'Horario',
                'items' => [
                     ['label' => 'Index', 'url' => '/ren-horario/index'],
                     ['label' => 'Crear', 'url' => '/ren-horario/create'],
                ],
            ],
            [
                'label' => 'Modelo',
                'items' => [
                     ['label' => 'Index', 'url' => '/ren-modelo/index'],
                     ['label' => 'Crear', 'url' => '/ren-modelo/create'],
                ],
            ],
            [
                'label' => 'Auto',
                'items' => [
                     ['label' => 'Index', 'url' => '/ren-auto/index'],
                     ['label' => 'Crear', 'url' => '/ren-auto/create'],
                ],
            ],
            [
                'label' => 'Transmisión',
                'items' => [
                     ['label' => 'Index', 'url' => '/cat-transmision/index'],
                     ['label' => 'Crear', 'url' => '/cat-transmision/create'],
                ],
            ],
            [
                'label' => 'Marca',
                'items' => [
                     ['label' => 'Index', 'url' => '/cat-marca/index'],
                     ['label' => 'Crear', 'url' => '/cat-marca/create'],
                ],
            ],
            [
                'label' => 'Carrocería',
                'items' => [
                     ['label' => 'Index', 'url' => '/cat-carroceria/index'],
                     ['label' => 'Crear', 'url' => '/cat-carroceria/create'],
                ],
            ],
            [
                'label' => 'Empleado',
                'items' => [
                     ['label' => 'Index', 'url' => '/ren-empleado/index'],
                     ['label' => 'Crear', 'url' => '/ren-empleado/create'],
                ],
            ],
        [
            'label' => 'Otros',
            'items' => [
                ['label' => 'Algo', 
                'items' => [
                    ['label' => 'Index', 'url' => '/ren-empleado/index'],
                ]],
            ]
        ],
            
            ['label' => $bandera, 'url' => ['/site/language', 'language' => $language]],
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
            ],
        

    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
