<?php

namespace app\controllers;

use app\models\CatMarca;
use app\models\CatMarcaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatMarcaController implements the CRUD actions for CatMarca model.
 */
class CatMarcaController extends Controller
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
     * Lists all CatMarca models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CatMarcaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatMarca model.
     * @param int $mar_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($mar_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($mar_id),
        ]);
    }

    /**
     * Creates a new CatMarca model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CatMarca();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'mar_id' => $model->mar_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatMarca model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $mar_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($mar_id)
    {
        $model = $this->findModel($mar_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'mar_id' => $model->mar_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatMarca model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $mar_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($mar_id)
    {
        $this->findModel($mar_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatMarca model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $mar_id Id
     * @return CatMarca the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($mar_id)
    {
        if (($model = CatMarca::findOne(['mar_id' => $mar_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
