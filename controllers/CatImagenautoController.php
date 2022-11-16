<?php

namespace app\controllers;

use app\models\CatImagenauto;
use app\models\CatImagenautoSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CatImagenautoController implements the CRUD actions for CatImagenauto model.
 */
class CatImagenautoController extends Controller
{
    /**
     * @inheritDoc
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
     * Lists all CatImagenauto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CatImagenautoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatImagenauto model.
     * @param int $img_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($img_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($img_id),
        ]);
    }

    public function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
    ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

    /**
     * Creates a new CatImagenauto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        
        $model = new CatImagenauto();

        if ($this->request->isPost) {


        if ($model->load($this->request->post())) {
            $this->guardarImagen($model);
            // $model->das_roles = join(',', $model->lista_roles);
            if ($model->save()) {
                return $this->redirect(['index', 'img_id' => $model->img_id]);
            }
        }
    }else{
        $model->loadDefaultValues();
    }
    return $this->render('create', [
        'model' => $model,
    ]);
    }

    /**
     * Updates an existing CatImagenauto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $img_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($img_id)
    { 

        $model = $this->findModel($img_id);
        if ($this->request->isPost && $model->load($this->request->post())) {
            $this->guardarImagen($model);
            // $model->das_roles = join(',', $model->lista_roles);
            if ($model->save()) {
                return $this->redirect(['view', 'img_id' => $model->img_id]);
            }
        }
        $model->archivo_imagen = "/img/{$model->img_imagen}.jpg";
        // $model->lista_roles = explode(',', $model->das_roles);
        // if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'img_id' => $model->img_id]);
        // }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    private function guardarImagen($model)
    {

        $objeto_imagen = UploadedFile::getInstance($model, 'archivo_imagen');
        if (!is_null($objeto_imagen)) {
            $nombre = $model->img_titulo; //reset(explode(".", $objeto_imagen->name));
            $extension = 'jpg'; //end((explode(".", $objeto_imagen->name)));
            $destino = Yii::$app->basePath . "/web/img/{$nombre}.{$extension}";
            $objeto_imagen->saveAs($destino);
        }else{
            die('Nel');
        }
    }

    /**
     * Deletes an existing CatImagenauto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $img_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($img_id)
    {
        $this->findModel($img_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatImagenauto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $img_id Id
     * @return CatImagenauto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($img_id)
    {
        if (($model = CatImagenauto::findOne(['img_id' => $img_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
