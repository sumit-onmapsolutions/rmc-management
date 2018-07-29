<?php

namespace backend\controllers;

use Yii;
use common\models\Orders;
use common\models\OrdersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\ConcreteTransaction;
use common\models\EquipmentTransaction;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::classname(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST']
                    // 'lists' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($event){
        if(Yii::$app->Permission->getPermission())
            return parent::beforeAction($event);
        else
            $this->redirect(['site/permission']);
    }

    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orders model.
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
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orders();
        $model->date = date('Y-m-d');
        $modelConcreteTransaction = new ConcreteTransaction();
        $modelEquipmentTransaction = new EquipmentTransaction();
        if ($model->load(Yii::$app->request->post()))
        {
            $model->user_id=Yii::$app->user->identity->id;
            $model->save();
            $modelConcreteTransaction->order_id = $model->id;
            $modelEquipmentTransaction->order_id = $model->id;
            if($modelConcreteTransaction->load(Yii::$app->request->post()) && $modelConcreteTransaction->save() && $modelEquipmentTransaction->load(Yii::$app->request->post()) && $modelEquipmentTransaction->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelConcreteTransaction' => $modelConcreteTransaction,
            'modelEquipmentTransaction' => $modelEquipmentTransaction
        ]);
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // print_r($model);
        // exit;
        $modelConcreteTransaction = new ConcreteTransaction();
        $concreteData = $modelConcreteTransaction->find()->where([ 'order_id' => $id ])->one();
        $modelEquipmentTransaction = new EquipmentTransaction();
        $equipmentData = $modelEquipmentTransaction->find()->where([ 'order_id' => $id ])->one();
        // print_r($equipmentData);
        // exit;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelConcreteTransaction' => $concreteData,
            'modelEquipmentTransaction' => $equipmentData
        ]);
    }

    /**
     * Deletes an existing Orders model.
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
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionLists($id)
    {

        $posts = \common\models\CustomerIds::find()
				->where(['customer_id' => $id])
				->all();
				
		if (!empty($posts)) {
			foreach($posts as $post) {
				echo "<option value='".$post->id."'>".$post->CID."</option>";
			}
		} else {
			echo "<option>No Customer Id's found</option>";
		}
    }

    public function actionListconcrete($id)
    {

        $posts = \common\models\ConcreteMaster::find()
                ->where(['is_parent' => $id])
                ->andWhere(['!=','is_parent',0])
				->all();
				
		if (!empty($posts)) {
			foreach($posts as $post) {
				echo "<option value='".$post->id."'>".$post->value."</option>";
			}
		} else {
			echo "<option value=''>No Sub Concrete found</option>";
		}
    }

    

}
