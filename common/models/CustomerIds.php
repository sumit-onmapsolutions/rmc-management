<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer_ids".
 *
 * @property string $id
 * @property string $customer_id
 * @property string $CID
 * @property int $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property int $is_deleted
 */
class CustomerIds extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_ids';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'CID'], 'required'], //, 'created_at', 'created_by', 'updated_at', 'updated_by', 'is_deleted'
            [['customer_id', 'created_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['updated_at'], 'safe'],
            [['CID'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer',
            'CID' => 'ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_deleted' => 'Is Deleted',
        ];
    }

    public function getCustomerName()
    {
        return $this->hasOne(Customers::className(), ['id' => 'customer_id'])->select('name')->scalar();
    }
}
