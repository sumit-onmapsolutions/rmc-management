<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $first_name;
    public $last_name;
    public $employee_id;
    public $phone_number;
    public $user_level;
    public $username;
    public $email;
    public $password;
    public $status;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['first_name','trim'],
            ['first_name', 'required'],
            ['first_name', 'string', 'max' => 255],

            ['last_name','trim'],
            ['last_name', 'required'],
            ['last_name', 'string', 'max' => 255],

            ['employee_id','trim'],
            ['employee_id', 'required'],
            ['employee_id', 'string', 'max' => 255],

            ['phone_number','trim'],
            ['phone_number', 'required'],
            ['phone_number', 'string', 'max' => 12],
            ['phone_number', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This Phone number has already been taken.'],

            ['user_level','trim'],
            ['user_level', 'required'],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 8],
            ['status', 'integer'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->employee_id = $this->employee_id;
        $user->phone_number = $this->phone_number;
        $user->user_level = $this->user_level;
        $user->username = $this->username;
        $user->email = $this->email;
        
        
        if(isset(Yii::$app->user->identity))
        {
            if(Yii::$app->user->identity->user_level == 1 || Yii::$app->user->identity->user_level == 2)
            {
                $user->status = 10;
            } 
        }
        else
        {
            $user->status = 0;
        }
  
        $user->setPassword($this->password);
        $user->generateAuthKey();
    
        return $user->save() ? $user : null;
    }
}
