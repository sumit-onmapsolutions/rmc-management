<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "section_engineers".
 *
 * @property string $id
 * @property string $engineer_id
 * @property string $section_id
 * @property string $section_incharge_id
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property int $is_deleted
 */
class SectionEngineers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section_engineers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['engineer_id', 'section_id'], 'required'],//, 'created_at', 'created_by', 'updated_at', 'updated_by', 'is_deleted', 'section_incharge_id'
            [['engineer_id', 'section_id', 'created_by', 'updated_by', 'is_deleted'], 'integer'],//, 'section_incharge_id'
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
            'engineer_id' => 'Engineer',
            'section_id' => 'Section',
            'section_incharge_id' => 'Section Incharge',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_deleted' => 'Is Deleted',
        ];
    }

    public function getSection()
    {
        return $this->hasOne(Sections::className(),['id' => 'section_id'])->select('section_name')->scalar();
    }

    public function getEngineer()
    {
        return $this->hasOne(User::className(),['id' => 'engineer_id'])->select('username')->scalar();
    }

    public function getSectionIncharge()
    {
        return $this->hasOne(User::className(),['id' => 'section_incharge_id'])->select('username')->scalar();
    }
}
