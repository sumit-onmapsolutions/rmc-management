<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "logs".
 *
 * @property string $id
 * @property string $user_id
 * @property string $module_name
 * @property string $action
 * @property string $details
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property int $is_deleted
 */
class Logs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'module_name', 'action', 'details', 'created_at', 'created_by', 'updated_at', 'updated_by', 'is_deleted'], 'required'],
            [['user_id', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['module_name', 'action', 'details'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'module_name' => 'Module Name',
            'action' => 'Action',
            'details' => 'Details',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
