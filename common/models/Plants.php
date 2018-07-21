<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plants".
 *
 * @property string $id
 * @property string $plant_name
 * @property string $plant_manager_id
 * @property string $status
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property int $is_deleted
 */
class Plants extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plants';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plant_name', 'plant_manager_id','status'], 'required'], //, 'created_at', 'created_by', 'updated_at', 'updated_by', 'is_deleted'
            [['plant_manager_id', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['plant_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plant_name' => 'Plant Name',
            'plant_manager_id' => 'Plant Manager',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_deleted' => 'Is Deleted',
        ];
    }

    public function getProjectManager()
    {
        return $this->hasOne(User::className(), ['id' => 'plant_manager_id'])->select('username')->scalar();
    }
}
