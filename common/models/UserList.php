<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $user_image
 * @property int $user_level
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property RoleTypes $userLevel
 */
class UserList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone_number', 'username', 'email','status'], 'required'], //,'password_hash', 'auth_key', 'password_reset_token', 'user_image', 'created_at', 'updated_at'
            [['user_level', 'status', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 250],
            [['phone_number'], 'string', 'max' => 30],
            [['username', 'email', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['user_image'], 'string', 'max' => 500],
            [['username'], 'unique'],
            [['user_level'], 'exist', 'skipOnError' => true, 'targetClass' => RoleTypes::className(), 'targetAttribute' => ['user_level' => 'role_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone_number' => 'Phone Number',
            'username' => 'User Name',
            'email' => 'Email Address',
            'password_hash' => 'Password',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'user_image' => 'User Image',
            'user_level' => 'User Level',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getUserLevel()
    {
        return $this->hasOne(RoleTypes::className(),['role_id' => 'user_level'])->select('role_name')->scalar();
    }
}
