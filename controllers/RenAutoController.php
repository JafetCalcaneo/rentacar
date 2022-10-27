<?php

namespace app\controllers;

use app\models\CatImagenauto;
use app\models\RenAuto;
use app\models\RenModelo;
use app\models\RenAutoSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RenAutoController implements the CRUD actions for RenAuto model.
 */
class RenAutoController extends Controller
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
     * Lists all RenAuto models.
     *
     * @return string
     */
    //--------------------VISTA DE
    public function actionIndex()
    {
        $searchModel = new RenAutoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RenAuto model.
     * @param int $aut_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($aut_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($aut_id),
        ]);
    }


    /**
     * Creates a new RenAuto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RenAuto();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'aut_id' => $model->aut_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RenAuto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $aut_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($aut_id)
    {
        $model = $this->findModel($aut_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'aut_id' => $model->aut_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RenAuto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $aut_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($aut_id)
    {
        $this->findModel($aut_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RenAuto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $aut_id Id
     * @return RenAuto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($aut_id)
    {
        if (($model = RenAuto::findOne(['aut_id' => $aut_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    //----------------------VISTA DETALLADA DEL AUTO----------------------
    public function actionAutoView($id = 0)
    {
        $query = RenAuto::find()->where(['aut_id' => $id]);
        $auto = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);
        return $this->render('auto/imagenes_list', compact('auto'));
    }

    //----------------------VISTA CATALOGO DE AUTOS----------------------

    public function actionCatalogoItem()
    {
        $queryImagen = CatImagenauto::find()->where(['img_seccion' => 'Autos', 'img_estatus' => '1']);
        $imagenAuto = new ActiveDataProvider([
            'query' => $queryImagen,
            'pagination' => false,
        ]);

        $datosAuto = RenAuto::find();
        $auto = new ActiveDataProvider([
            'query' => $datosAuto,
            'pagination' => false,
            'sort' => false,

        ]);
        return $this->render('catalogo/catalogo_list', compact('auto', 'imagenAuto'));
    }
}
