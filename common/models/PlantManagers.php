<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plant_managers".
 *
 * @property string $id
 * @property string $plant_id
 * @property string $plant_manager_id
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property int $is_deleted
 */
class PlantManagers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plant_managers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plant_id', 'plant_manager_id'], 'required'], //, 'created_at', 'created_by', 'updated_at', 'updated_by', 'is_deleted'
            [['plant_id', 'plant_manager_id', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plant_id' => 'Plant ID',
            'plant_manager_id' => 'Plant Manager',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
