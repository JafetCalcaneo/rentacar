<?php
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    $default = Yii::$app->session->get('language', 'en-USA');
    $language = $default == 'en-USA' ? 'es-ES' : 'en-USA';
    $bandera = Yii::$app->params['languages'][$language];

    echo Nav::widget([
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav'],
        'items' => [

            /*Yii::$app->user->id == 1 ? ['label' => Yii::t('app', 'Volver'), 'url' => ['/site/index']] : [ 'label' => 'Update', 'url' => ''],*/
            ['label' => Yii::t('app', 'Volver'), 'url' => ['/site/index']], 
            [
                'label' => 'Ajustes',
                'items' => [
                     ['label' => 'Index', 'url' => '/ren-renta/index'],
                     ['label' => 'Crear', 'url' => '/ren-renta/create'],
                ],
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