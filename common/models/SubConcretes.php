<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sub_concretes".
 *
 * @property string $id
 * @property string $concrete_master_id
 * @property string $sub_concrete_name
 * @property int $status
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property int $is_deleted
 */
class SubConcretes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_concretes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['concrete_master_id', 'sub_concrete_name', 'status'], 'required'],//, 'created_at', 'created_by', 'updated_at', 'updated_by', 'is_deleted'
            [['concrete_master_id', 'status', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['sub_concrete_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'concrete_master_id' => 'Main Concrete',
            'sub_concrete_name' => 'Name',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_deleted' => 'Is Deleted',
        ];
    }

    public function getConcreteName()
    {
        return $this->hasOne(ConcreteMaster::className(), ['id' => 'concrete_master_id'])->select('name')->scalar();
    }
}
