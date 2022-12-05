<?php

namespace app\controllers;

use Yii;
use kartik\mpdf\Pdf;
use yii\web\Controller;
use app\models\RenCliente;
use yii\filters\VerbFilter;
use app\models\RenClienteSearch;
use yii\web\NotFoundHttpException;


/**
 * RenClienteController implements the CRUD actions for RenCliente model.
 */
class RenClienteController extends Controller
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
     * Lists all RenCliente models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RenClienteSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RenCliente model.
     * @param int $cli_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($cli_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($cli_id),
        ]);
    }

    /**
     * Creates a new RenCliente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RenCliente();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'cli_id' => $model->cli_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RenCliente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $cli_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($cli_id)
    {
        $model = $this->findModel($cli_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cli_id' => $model->cli_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RenCliente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $cli_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($cli_id)
    {
        $this->findModel($cli_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RenCliente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $cli_id Id
     * @return RenCliente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cli_id)
    {
        if (($model = RenCliente::findOne(['cli_id' => $cli_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionReporte()
    {
        $clientes = RenCliente::find()->all();
        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('reporteClientes',['titulo' => 'Lista de clientes','clientes' => $clientes]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            //'options' => ['title' => 'Krajee Report Title'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader' => ['LISTA DE CLIENTES'],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }
}
