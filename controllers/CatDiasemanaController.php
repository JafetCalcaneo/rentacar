<?php

namespace app\controllers;

use app\models\CatDiasemana;
use app\models\CatDiasemanaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatDiasemanaController implements the CRUD actions for CatDiasemana model.
 */
class CatDiasemanaController extends Controller
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
     * Lists all CatDiasemana models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CatDiasemanaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatDiasemana model.
     * @param int $sem_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($sem_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($sem_id),
        ]);
    }

    /**
     * Creates a new CatDiasemana model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CatDiasemana();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'sem_id' => $model->sem_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatDiasemana model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $sem_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($sem_id)
    {
        $model = $this->findModel($sem_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sem_id' => $model->sem_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatDiasemana model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $sem_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($sem_id)
    {
        $this->findModel($sem_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatDiasemana model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $sem_id Id
     * @return CatDiasemana the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($sem_id)
    {
        if (($model = CatDiasemana::findOne(['sem_id' => $sem_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
