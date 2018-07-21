<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sections".
 *
 * @property string $id
 * @property string $section_name
 * @property string $section_incharge_id
 * @property string $project_id
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property int $is_deleted
 */
class Sections extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sections';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section_name', 'section_incharge_id','project_id'], 'required'], //, 'created_at', 'created_by', 'updated_at', 'updated_by', 'is_deleted'
            [['section_incharge_id', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['section_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section_name' => 'Section Name',
            'section_incharge_id' => 'Section Incharge',
            'project_id' => 'Project Name',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_deleted' => 'Is Deleted',
        ];
    }

    public function getSectionInchargeName()
    {
        return $this->hasOne(User::className(), ['id' => 'section_incharge_id'])->select('username')->scalar();
    }

    public function getProjectName()
    {
        return $this->hasOne(Projects::className(), ['id' => 'project_id'])->select('name')->scalar();
    }
}
