<?php

namespace app\controllers;

use app\models\CatTransmision;
use app\models\CatTransmisionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatTransmisionController implements the CRUD actions for CatTransmision model.
 */
class CatTransmisionController extends Controller
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
     * Lists all CatTransmision models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CatTransmisionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatTransmision model.
     * @param int $tra_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($tra_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($tra_id),
        ]);
    }

    /**
     * Creates a new CatTransmision model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CatTransmision();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'tra_id' => $model->tra_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatTransmision model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $tra_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($tra_id)
    {
        $model = $this->findModel($tra_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'tra_id' => $model->tra_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatTransmision model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $tra_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($tra_id)
    {
        $this->findModel($tra_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatTransmision model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $tra_id Id
     * @return CatTransmision the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($tra_id)
    {
        if (($model = CatTransmision::findOne(['tra_id' => $tra_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
