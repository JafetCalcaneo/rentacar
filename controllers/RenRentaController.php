<?php

namespace app\controllers;

use app\models\RenRenta;
use app\models\RenRentaSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RenRentaController implements the CRUD actions for RenRenta model.
 */
class RenRentaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all RenRenta models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RenRentaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RenRenta model.
     * @param int $ren_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ren_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ren_id),
        ]);
    }

    /**
     * Creates a new RenRenta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RenRenta();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ren_id' => $model->ren_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RenRenta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ren_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ren_id)
    {
        $model = $this->findModel($ren_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ren_id' => $model->ren_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RenRenta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ren_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ren_id)
    {
        $this->findModel($ren_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RenRenta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ren_id Id
     * @return RenRenta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ren_id)
    {
        if (($model = RenRenta::findOne(['ren_id' => $ren_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
