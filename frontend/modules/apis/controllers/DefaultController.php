<?php

namespace frontend\modules\apis\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\db\Expression;


use common\models\LoginForm;
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
        return array("status"=>true,"message"=>"success");
    }
}
