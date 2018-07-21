<?php

namespace backend\controllers;

use Yii;
use common\models\ExcelRecords;
use common\models\ExcelRecordsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\ConcreteMaster;

/**
 * ExcelRecordsController implements the CRUD actions for ExcelRecords model.
 */
class ExcelRecordsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ExcelRecords models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExcelRecordsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ExcelRecords model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ExcelRecords model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ExcelRecords();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $imageName = "excel_reports_".rand();
           $model->path = UploadedFile::getInstance($model,'path');
            
            if(!empty($model->path)){ 
                $model->path->saveAs('../images/uploads/'.$imageName.'.'.$model->path->extension);
                $model->path = 'uploads/'.$imageName.'.'.$model->path->extension;
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{  
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        else 
        {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }



    /**
     * Updates an existing ExcelRecords model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ExcelRecords model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ExcelRecords model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ExcelRecords the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ExcelRecords::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionImportExcel()
    {
        $inputFile =  "../images/uploads/concrete.xlsx";
        //$inputFile =  "uploads/concrete.xlsx";

        try
        {
           $inputFileType= PHPExcel_IOFactory::identify($inputFile);
           $objReader = PHPExcel_IOFactory:: createReader($inputFile);
           $objPHPExcel = $objReader->load($inputFile);    
        }
        catch(Exception $e)
        {
           die("Error");
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow= $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for( $row =1; $row <= $highestRow; $row++ )
        {
            $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);

            if($row == 1)
            {
                continue;
            }

            $concrete = new ConcreteMaster;
            $id = $rowData[0][0];
            $concrete->name = $rowData[0][1];
            $concrete->status = $rowData[0][2];
            $concrete->created_at = $rowData[0][3];
            $concrete->created_by = $rowData[0][4];
            $concrete->updated_at = $rowData[0][5];
            $concrete->updated_by = $rowData[0][6];
            $concrete->id_deleted = $rowData[0][7];

            print_r($concrete->getErrors());

        }
        die('okay');


    }

}
