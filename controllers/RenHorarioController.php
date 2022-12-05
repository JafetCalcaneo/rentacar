<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RenHorario;
use yii\filters\VerbFilter;
use app\models\RenHorarioSearch;
use yii\web\NotFoundHttpException;

/**
 * RenHorarioController implements the CRUD actions for RenHorario model.
 */
class RenHorarioController extends Controller
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
     * Lists all RenHorario models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RenHorarioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RenHorario model.
     * @param int $hor_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($hor_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($hor_id),
        ]);
    }

    /**
     * Creates a new RenHorario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RenHorario();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'hor_id' => $model->hor_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RenHorario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $hor_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($hor_id)
    {
        $model = $this->findModel($hor_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'hor_id' => $model->hor_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RenHorario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $hor_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($hor_id)
    {
        $this->findModel($hor_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RenHorario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $hor_id Id
     * @return RenHorario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($hor_id)
    {
        if (($model = RenHorario::findOne(['hor_id' => $hor_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
