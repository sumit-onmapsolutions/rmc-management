<?php

namespace app\modules\apis\controllers;

use Yii;
use yii\web\Controller;
use yii\rest\ActiveController;
use yii\web\Response;

use common\models\User;

/**
 * Default controller for the `apis` module
 */
class DefaultController extends ActiveController
{
    public $modelClass = "common\models\User";

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        
        // remove authentication filter
        $auth = $behaviors['authenticator'];
        unset($behaviors['authenticator']);
        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
        ];
        // re-add authentication filter
        $behaviors['authenticator'] = $auth;
        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator']['except'] = ['options'];
        return $behaviors;
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return [ "status"=> true ];
    }

    public function actionIndex2()
    {
        $model = new User();
        $data = $model->find()->where(["user_level"=>4])->asArray()->all();
        return array("status"=> true,"message"=>"Success","data"=>$data);
    }

    
}
