<?php

namespace app\controllers;

use app\models\RenBanner;
use app\models\RenBannerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RenBannerController implements the CRUD actions for RenBanner model.
 */
class RenBannerController extends Controller
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
     * Lists all RenBanner models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RenBannerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RenBanner model.
     * @param int $ban_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ban_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ban_id),
        ]);
    }

    /**
     * Creates a new RenBanner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RenBanner();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ban_id' => $model->ban_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RenBanner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ban_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ban_id)
    {
        $model = $this->findModel($ban_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ban_id' => $model->ban_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RenBanner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ban_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ban_id)
    {
        $this->findModel($ban_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RenBanner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ban_id Id
     * @return RenBanner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ban_id)
    {
        if (($model = RenBanner::findOne(['ban_id' => $ban_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
