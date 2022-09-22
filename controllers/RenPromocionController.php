<?php

namespace app\controllers;

use app\models\RenPromocion;
use app\models\RenPromocionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RenPromocionController implements the CRUD actions for RenPromocion model.
 */
class RenPromocionController extends Controller
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
     * Lists all RenPromocion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RenPromocionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RenPromocion model.
     * @param int $pro_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pro_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pro_id),
        ]);
    }

    /**
     * Creates a new RenPromocion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RenPromocion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'pro_id' => $model->pro_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RenPromocion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pro_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pro_id)
    {
        $model = $this->findModel($pro_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pro_id' => $model->pro_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RenPromocion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pro_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pro_id)
    {
        $this->findModel($pro_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RenPromocion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pro_id Id
     * @return RenPromocion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pro_id)
    {
        if (($model = RenPromocion::findOne(['pro_id' => $pro_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
