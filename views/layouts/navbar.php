<?php

use Yii;
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use kartik\bs5dropdown\Dropdown;
use kartik\bs5dropdown\ButtonDropdown;
use webvimark\modules\UserManagement\UserManagementModule;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'brandOptions' => ['class' => 'p-4'],
    'options' => ['class' => 'navbar navbar-expand-lg bg-navbar fixed-top navbar-light', 'style' => 'background-color: #e3f2fd']

]);
$default = Yii::$app->session->get('language', 'en-mx');
$language = $default == 'en-US' ? 'es-INGLES' : 'en-US';
$bandera = Yii::$app->params['languages'][$language];

echo Nav::widget([
    'encodeLabels' => false,
    'options' => ['class' => 'navbar-nav'],
    'items' => [ //el dropdraom
        [
            'label' => 'Autos',
            'items' => [ //ITERAR CARROCERIAS
                ['label' => 'Autos', 'url' => '/site/autos'],
                //  ['label' => 'Crear', 'url' => '/ren-renta/create'],
                ['label' => 'Reporte', 'url' => '/site/reporte'],

            ],

        ],

        ['label' => 'Volver', 'url' => ['/site/index']],
        [
            'label' => 'Ajustes',
            'items' => [
                ['label' => 'Index', 'url' => '/ren-renta/index'],
                ['label' => 'Crear', 'url' => '/ren-renta/create'],
            ],
        ],
        Yii::$app->user->isSuperAdmin 
            ? [
			'label' => 'Administración',
			'items'=>UserManagementModule::menuItems()
		] : '' ,
        // ['label' => $bandera, 'url' => ['/site/language', 'language' => $language]],
        Yii::$app->user->isGuest
            ? ['label' => 'Login', 'url' => ['/user-management/auth/login']]
            : '<li class="nav-item">'
            . Html::beginForm(['/user-management/auth/logout'])
            . Html::submitButton(
                'Cerrar Sesión (' . Yii::$app->user->identity->username . ')',
                ['class' => 'nav-link btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
    ],
    'dropdownClass' => Dropdown::class, // use the custom dropdown
    'options' => ['class' => 'navbar-nav mr-auto me-auto'],
]);
NavBar::end();
