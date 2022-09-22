<?php

namespace app\controllers;

use app\models\CatEstatus;
use app\models\CatEstatusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatEstatusController implements the CRUD actions for CatEstatus model.
 */
class CatEstatusController extends Controller
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
     * Lists all CatEstatus models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CatEstatusSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatEstatus model.
     * @param int $est_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($est_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($est_id),
        ]);
    }

    /**
     * Creates a new CatEstatus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CatEstatus();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'est_id' => $model->est_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatEstatus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $est_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($est_id)
    {
        $model = $this->findModel($est_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'est_id' => $model->est_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatEstatus model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $est_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($est_id)
    {
        $this->findModel($est_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatEstatus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $est_id Id
     * @return CatEstatus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($est_id)
    {
        if (($model = CatEstatus::findOne(['est_id' => $est_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
