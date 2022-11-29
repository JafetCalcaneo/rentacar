<?php

use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;
use app\widgets\DarkMode;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
]);
$default = Yii::$app->session->get('language', 'en-US');
$language = $default == 'en-US' ? 'es-INGLES' : 'en-US';
$bandera = Yii::$app->params['languages'][$language];
//Icono modo oscuro
$modo = $default == 'lunaBlanca' ? 'lunaNegra' : 'lunaBlanca';
$luna = Yii::$app->params['iconoLuna'][$modo];
$isDark = Yii::$app->params['isDark'];
$imagen = '/img/iconos/lunaBlanca.png';

echo Nav::widget([
    'encodeLabels' => false,
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        ['label' => Yii::t('app', 'Autos'), 'url' => ['/ren-auto/catalogo-item']],
        ['label' => 'Volver', 'url' => ['/site/index']],
        [
            'label' => 'Ajustes',
            'items' => [
                ['label' => 'Index', 'url' => '/ren-renta/index'],
                ['label' => 'Crear', 'url' => '/ren-renta/create'],
            ],
        ],
        ['label' => $bandera, 'url' => ['/site/language', 'language' => $language]],
        Yii::$app->user->isSuperAdmin
            ? [
            'label' => Yii::t('app', 'Administración'),
            'items' => UserManagementModule::menuItems()
        ] : '',
        Yii::$app->user->isGuest
            ? ['label' => 'Login', 'url' => ['/user-management/auth/login']]
            : '<li class="nav-item">'
            . Html::beginForm(['/user-management/auth/logout'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'nav-link btn btn-link logout']
            )
            . Html::endForm()
            . '</li>',
        
            DarkMode::widget([
                'imagen' => $imagen,
                'clases' => 'isDark'
            ])
    ],


]);
NavBar::end();

