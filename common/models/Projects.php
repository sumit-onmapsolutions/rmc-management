<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property string $id
 * @property string $name
 * @property string $project_head_id
 * @property string $project_manager_id
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property int $is_deleted
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'project_head_id', 'project_manager_id'], 'required'], //, 'created_at', 'created_by', 'updated_at', 'updated_by', 'is_deleted'
            [['project_head_id', 'project_manager_id', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'project_head_id' => 'Project Head',
            'project_manager_id' => 'Project Manager',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_deleted' => 'Is Deleted',
        ];
    }

    public function getProjectManager()
    {
        return $this->hasOne(User::className(),['id' => 'project_manager_id'])->select('username')->scalar();
    }

    public function getProjectHead()
    {
        return $this->hasOne(User::className(),['id' => 'project_head_id'])->select('username')->scalar();
    }
}
