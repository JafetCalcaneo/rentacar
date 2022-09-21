<?php

namespace app\controllers;

use app\models\RenEmpleado;
use app\models\RenEmpleadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RenEmpleadoController implements the CRUD actions for RenEmpleado model.
 */
class RenEmpleadoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all RenEmpleado models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RenEmpleadoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RenEmpleado model.
     * @param int $emp_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($emp_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($emp_id),
        ]);
    }

    /**
     * Creates a new RenEmpleado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RenEmpleado();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'emp_id' => $model->emp_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RenEmpleado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $emp_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($emp_id)
    {
        $model = $this->findModel($emp_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'emp_id' => $model->emp_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RenEmpleado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $emp_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($emp_id)
    {
        $this->findModel($emp_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RenEmpleado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $emp_id Id
     * @return RenEmpleado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($emp_id)
    {
        if (($model = RenEmpleado::findOne(['emp_id' => $emp_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
