<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "concrete_master".
 *
 * @property string $id
 * @property string $type
 * @property string $value
 * @property int $is_parent
 * @property int $is_deleted
 */
class ConcreteMaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'concrete_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value','is_parent'], 'required'],//, 'is_deleted','type',
            [['is_parent', 'is_deleted'], 'integer'],
            [['type', 'value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'value' => 'Name',
            'is_parent' => 'Parent Concrete',
            'is_deleted' => 'Is Deleted',
        ];
    }

    public function getParentConcrete()
    {
        return $this->hasOne(ConcreteMaster::className(),['id' => 'is_parent'])->select('value')->scalar();
    }
}
