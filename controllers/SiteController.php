<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\web\Response;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\RenBanner;
use app\models\ContactForm;
use yii\filters\VerbFilter;
use app\models\CatImagenauto;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use kartik\mpdf\Pdf;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    //----------------------------VISTA DEL INDEX----------------------------------
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isSuperAdmin) {
            $img_dashboard = new ActiveDataProvider([
                'query' => CatImagenauto::find()->where(['img_seccion' => 'Dashboard',]),
                'pagination' => false,
            ]);
            return $this->render('admin/index', compact('img_dashboard'));

        } else {
            $servicios = new ActiveDataProvider([
                'query' => CatImagenauto::find()->where(['img_seccion' => 'Servicios', 'img_estatus' => '1']),
                'pagination' => false,
            ]);
            $buscados = new ActiveDataProvider([
                'query' => CatImagenauto::find()->where(['img_seccion' => 'Masrentados', 'img_estatus' => '1']),
                'pagination' => false,
            ]);

            $banners = RenBanner::find()->All();
            $items = [];
            foreach ($banners as $ban => $banner) {
                $items[] = Html::img($banner->ban_url, ['width' => '1600px', 'height' => '530px']);
            }

            return $this->render('cliente/index', compact('items', 'servicios', 'buscados'));
        }
    }




    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionLanguage()
    {
        Yii::$app->session->set('language', $_REQUEST['language']);
        header('location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
