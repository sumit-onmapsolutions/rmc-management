<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sites".
 *
 * @property string $id
 * @property string $site_id
 * * @property string $project_id
 * @property string $name
 * @property string $location
 * @property string $city
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property int $is_deleted
 */
class Sites extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sites';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'city','project_id'], 'required'], //, 'created_at', 'created_by', 'updated_at', 'updated_by', 'is_deleted'
            [['location'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['site_id', 'name', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'site_id' => 'Site ID',
            'project_id' => 'Project Name',
            'name' => 'Name',
            'location' => 'Location',
            'city' => 'City',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_deleted' => 'Is Deleted',
        ];
    }

    public function getProjectName()
    {
        return $this->hasOne(Projects::className(), ['id' => 'project_id'])->select('name')->scalar();
    }
}
