<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "concrete_transaction".
 *
 * @property string $id
 * @property string $order_id
 * @property string $parent_concrete_id
 * @property string $sub_concrete_id
 * @property int $quantity
 * @property string $unit
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $is_deleted
 */
class ConcreteTransaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'concrete_transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_concrete_id', 'sub_concrete_id', 'quantity'], 'required'],//, 'order_id','created_at', 'created_by', 'updated_at', 'updated_by', 'is_deleted'
            [['order_id', 'parent_concrete_id', 'sub_concrete_id', 'quantity', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
           // [['unit'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
          //  [['unit'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'parent_concrete_id' => 'Parent Concrete ID',
            'sub_concrete_id' => 'Sub Concrete ID',
            'quantity' => 'Quantity',
            'unit' => 'Unit',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
