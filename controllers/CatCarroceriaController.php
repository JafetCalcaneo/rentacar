<?php

namespace app\controllers;

use app\models\CatCarroceria;
use app\models\CatCarroceriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatCarroceriaController implements the CRUD actions for CatCarroceria model.
 */
class CatCarroceriaController extends Controller
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
     * Lists all CatCarroceria models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CatCarroceriaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatCarroceria model.
     * @param int $car_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($car_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($car_id),
        ]);
    }

    /**
     * Creates a new CatCarroceria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CatCarroceria();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'car_id' => $model->car_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatCarroceria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $car_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($car_id)
    {
        $model = $this->findModel($car_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'car_id' => $model->car_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatCarroceria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $car_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($car_id)
    {
        $this->findModel($car_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatCarroceria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $car_id Id
     * @return CatCarroceria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($car_id)
    {
        if (($model = CatCarroceria::findOne(['car_id' => $car_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
