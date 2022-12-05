<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\CatMetodopago;
use app\models\CatMetodopagoSerch;
use yii\web\NotFoundHttpException;

/**
 * CatMetodopagoController implements the CRUD actions for CatMetodopago model.
 */
class CatMetodopagoController extends Controller
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
     * Lists all CatMetodopago models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CatMetodopagoSerch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatMetodopago model.
     * @param int $met_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($met_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($met_id),
        ]);
    }

    /**
     * Creates a new CatMetodopago model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CatMetodopago();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'met_id' => $model->met_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatMetodopago model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $met_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($met_id)
    {
        $model = $this->findModel($met_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'met_id' => $model->met_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatMetodopago model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $met_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($met_id)
    {
        $this->findModel($met_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatMetodopago model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $met_id Id
     * @return CatMetodopago the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($met_id)
    {
        if (($model = CatMetodopago::findOne(['met_id' => $met_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
