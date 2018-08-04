<?php

namespace frontend\modules\apis\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\db\Expression;

use common\models\LoginForm;
use frontend\models\SignupForm;

use frontend\models\PasswordResetRequestForm;
/**
 * Default controller for the `apis` module
 */
class AuthController extends ActiveController
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
    * login module
    * @return boolean
    */

    public function actionLogin()
    {
      try{
            $model = new LoginForm();
            $data =  json_decode(utf8_encode(file_get_contents("php://input")), false);

            if ($data) {

              $model->username = $data->username;
              $model->password = $data->password;

              if($model->login()){
                $user = Yii::$app->user->identity;
                return array('status' => true,'message'=>'Login Successfull','data'=>$user);
              }else{
                return array('status' => false,'message'=>'Error while authenticate user','coz'=>$model->getErrors());
              }

            } else {
                return array('status' => false,'message'=>'Check your credentials');
            }


          }catch(Exception $e){
            return array('status' => false,'error'=>$e);
          }
    }

    /**
    * signup module
    * @return boolean
    */
    public function actionSignup()
    {
        try{
                  $model = new SignupForm();
                  $data =  json_decode(utf8_encode(file_get_contents("php://input")), false);
                  if ($data) {
                      $model->last_name     = $data->last_name;
                      $model->first_name    = $data->first_name;
                      $model->phone_number  = $data->phone_number;
                      $model->username      = $data->username;
                      $model->user_level    = $data->user_level;
                      $model->email         = $data->email;
                      $model->password      = $data->password;
                      // return array("data"=>$model,"coz"=>$model->signup());
                    if ($user = $model->signup()) {
                        if (Yii::$app->getUser()->login($user)) {
                            return array('status' => true,'message'=>'Signup Successfull','data'=>$user);
                        }
                    }else{
                      // $model->getErrors()
                          return array('status' => false,'message'=>'not saved' , 'coz'=> $model->getErrors());
                    }

                  } else {
                    return array('status' => false,'message'=>'Check your credentials');
                  }

        }catch(Exception $e){
            return array('status' => false,'error'=>$e);
        }
    }


    /**
    * forgot password module
    * @return boolean
    */
    public function actionPasswordResetRequest()
    {
       try{
           $data =  json_decode(utf8_encode(file_get_contents("php://input")), false);
           if($data){
               $model = new PasswordResetRequestForm();
               $model->email = $data->emailid;
               if ($model->sendEmail()) {
                   return array("status"=>true, "message"=>'Check your email for further instructions.');
               } else {
                   return array("status"=>true, "message"=>'Sorry, we are unable to reset password for the provided email address.');
               }
           }else{
              return array('status' => false  , 'message'=>'input not received');
           }
       }catch(Exception $e){
           return array('status' => false  , 'message'=>'catch error');
        }
    }

    /**
    * validate mobileno,emailid and employee id
    * @return boolean
    */
    public function actionValidateUser(){
       try{
          $data =  json_decode(utf8_encode(file_get_contents("php://input")), false);
          if($data){
            if( isset($data->emailid))
             $userCount = User::find()->where(["username" => $data->emailid])->count();
             if($userCount >= 1){
                 return array('status' => true,'notDuplicate' => false, 'duplicate' => 'yes', 'message'=>'This Email address already exists');
             }else{
                 return array('status' => true,'notDuplicate' => true, 'duplicate' => 'no', 'message'=>'all good');
             }
         }else{
             return array('status' => false);
         }
      }catch(Exception $e){
         return array('status' => false  , 'message'=>'catch error');
      }

    }

    /**
    * validate mobileno,emailid and employee id
    * @return boolean
    */
    public function actionAuthCheck()
    {
      try{
          $data =  json_decode(utf8_encode(file_get_contents("php://input")), false);
         //  if($data){
         //    if(isset($data->authKey))
         //     $userData = User::find()->where(["auth_key" => $data->authKey])->one();
         //     if(isset($userData)){
         //         return array('status' => true,'data' => $userData, 'message'=>'User details');
         //     }else{
         //         return array('status' => false, 'message'=>'User Not Found');
         //     }
         // }else{
         //     return array('status' => false,'message'=>'details not reached');
         // }
         return array('status' => true,'message'=>$data);
      }catch(Exception $e){
           return array('status' => false  , 'message'=>'catch error');
      }
    }



}
