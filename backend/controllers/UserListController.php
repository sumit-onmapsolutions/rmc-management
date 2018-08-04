<?php

namespace backend\controllers;

use Yii;
use common\models\UserList;
use common\models\UserListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\SignupForm;
use yii\helpers\Json;

/**
 * UserListController implements the CRUD actions for UserList model.
 */
class UserListController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($event)
    {
        if(Yii::$app->Permission->getPermission())
            return parent::beforeAction($event);
        else
            $this->redirect(['site/permission']);
    }
    /**
     * Lists all UserList models.
     * @return mixed
     */
    /*public function actionIndex()
    {
        $searchModel = new UserListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/

    public function actionIndex()
    {
        $searchModel = new UserListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                if (Yii::$app->request->post('hasEditable')) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            
            $attribute = Yii::$app->request->post('editableAttribute');
            $index = Yii::$app->request->post('editableIndex');
            $userid = Yii::$app->request->post('editableKey');
            $UserModel = UserList::findOne($userid);

            $out = Json::encode(['output'=>'','message'=>'']);
            $post = [];
            $user = Yii::$app->request->post('UserList');
           
            $newValue = '';

            if($attribute == 'name'){
                $newValue =  $user[$index]["name"];
                $UserModel->name = $newValue;

            } else if ($attribute == 'status'){
                $newValue =  $user[$index]["status"];
               if($UserModel->status == $newValue){
                return false;
               }else{
                   $UserModel->status = $newValue;
               }
                 
            }

            if (($newValue != '')) {
                if($UserModel->save(false)){
                    return ['output'=>$newValue, 'message'=>''];
                }else{
                    return ['output'=>$newValue, 'message'=>'Error Occured while saving','error'=>$UserModel->getErrors()];
                }

            }else{
                return ['output'=>'failed', 'attribute'=>$attribute,'message'=>''];
            }
            
          }


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Displays a single UserList model.
     * @param integer $id
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
     * Creates a new UserList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                // return $this->redirect('index');
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing UserList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
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
     * Deletes an existing UserList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserList::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
