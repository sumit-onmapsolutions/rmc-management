<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property string $id
 * @property string $name
 * @property string $customer_id
 * @property int $contact_no
 * @property string $email_id
 * @property string $city
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property int $is_deleted
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'customer_id','email_id', 'city'], 'required'], //,'created_at', 'created_by', 'updated_at', 'updated_by', 'is_deleted'
            [['contact_no', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'city'], 'string', 'max' => 255],
            [['customer_id', 'email_id'], 'string', 'max' => 100],
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
            'customer_id' => 'ID',
            'contact_no' => 'Contact No',
            'email_id' => 'Email',
            'city' => 'City',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
