<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Dashboard;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\DashboardSearch;
use yii\web\NotFoundHttpException;

/**
 * DashboardController implements the CRUD actions for Dashboard model.
 */
class DashboardController extends Controller
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
     * Lists all Dashboard models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DashboardSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dashboard model.
     * @param int $das_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($das_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($das_id),
        ]);
    }

    /**
     * Creates a new Dashboard model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Dashboard();

        if ($this->request->isPost) {
            // if ($model->load($this->request->post()) && $model->save()) {
            //     return $this->redirect(['view', 'das_id' => $model->das_id]);
            // }
            if ($model->load($this->request->post())) {
                $model->das_roles = join(',', $model->lista_roles);
                if ($model->validate()) {
                    $this->guardarImagen($model);
                    if ($model->save()) {
                        return $this->redirect(['view', 'das_id' => $model->das_id]);
                    }
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Dashboard model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $das_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($das_id)
    {
        $model = $this->findModel($das_id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->das_roles = join(',', $model->lista_roles);
            if ($model->validate()) {
                $this->actualizarImagen($model);
                if ($model->save()) {
                    return $this->redirect(['view', 'das_id' => $model->das_id]);
                }
            }
        }

        $model->archivo_imagen = "/img/dashboard/{$model->das_imagen}.png";
        $model->lista_roles = explode(',', $model->das_roles);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    private function guardarImagen($model)
    {
        $objeto_imagen = UploadedFile::getInstance($model, 'archivo_imagen');
        if (!is_null($objeto_imagen)) {
            $ruta = Yii::$app->basePath . "/web/img/";
            $nombre = $model->das_imagen; //reset(explode(".", $objeto_imagen->name));
            $extension = 'png'; //end((explode(".", $objeto_imagen->name)));
            $destino = "{$ruta}{$nombre}.{$extension}";
            $objeto_imagen->saveAs($destino);
        }
    }

    private function actualizarImagen($model)
    {
        $nuevo = $model->das_imagen;
        $viejo = $model->oldAttributes['das_imagen'];
        if ($nuevo != $viejo) {
            $ruta = Yii::$app->basePath . "/web/img/";
            $extension = "png";
            $origen = "{$ruta}{$viejo}.{$extension}";
            $destino = "{$ruta}{$nuevo}.{$extension}";
            rename($origen, $destino);
        } else {
            $this->guardarImagen($model);
        }
    }


    /**
     * Deletes an existing Dashboard model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $das_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($das_id)
    {
        $this->findModel($das_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dashboard model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $das_id Id
     * @return Dashboard the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($das_id)
    {
        if (($model = Dashboard::findOne(['das_id' => $das_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
