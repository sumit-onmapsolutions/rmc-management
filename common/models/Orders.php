<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property string $id
 * @property string $user_id
 * @property string $date
 * @property string $customer_id
 * @property string $project_manager_id
 * @property string $site_id
 * @property string $section_id
 * @property int $qty
 * @property int $unit
 * @property int $isPumping
 * @property int $isDumping
 * @property string $vehicle_interval
 * @property string $tentetive_time
 * @property string $confirmed_time
 * @property string $plant_id
 * @property string $additional_if_any
 * @property int $status
 * @property string $reason
 * @property int $isSIApproved
 * @property int $isPMApproved
 * @property int $isAdminApproved
 * @property string $mix_type
 * @property string $mix_no
 * @property string $vehicle_no
 * @property string $name_of_driver
 * @property string $name_of_helper
 * @property string $plant_dispatch_time
 * @property string $slump_at_plant_mm
 * @property string $site_reach_time
 * @property string $slump_at_site_reach_time
 * @property string $any_admixture_addedatsite
 * @property string $any_water_added_at_site
 * @property string $after_addition_of_water
 * @property string $admixture_slumpmm
 * @property string $pour_start_time
 * @property string $pour_completed_time
 * @property string $plant_return_time
 * @property int $isdeleted
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $updated_by
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'date', 'customer_id', 'site_id', 'section_id', 'qty', 'unit', 'isPumping', 'isDumping', 'vehicle_interval', 'tentetive_time', 'confirmed_time', 'additional_if_any', 'status', 'reason', 'isSIApproved', 'isPMApproved', 'isAdminApproved', 'mix_type', 'mix_no', 'vehicle_no', 'name_of_driver', 'name_of_helper', 'plant_dispatch_time', 'slump_at_plant_mm', 'site_reach_time', 'slump_at_site_reach_time', 'any_admixture_addedatsite', 'any_water_added_at_site', 'after_addition_of_water', 'admixture_slumpmm', 'pour_start_time', 'pour_completed_time', 'plant_return_time'], 'required'],//, 'isdeleted', 'created_by', 'created_at', 'updated_at', 'updated_by'
            [['user_id', 'customer_id', 'project_manager_id', 'site_id', 'section_id', 'qty', 'unit', 'isPumping', 'isDumping', 'plant_id', 'status', 'isSIApproved', 'isPMApproved', 'isAdminApproved', 'isdeleted', 'created_by', 'updated_by'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['reason'], 'string'],
            [['vehicle_interval', 'tentetive_time', 'confirmed_time', 'additional_if_any', 'mix_type', 'mix_no', 'vehicle_no', 'name_of_driver', 'name_of_helper', 'plant_dispatch_time', 'slump_at_plant_mm', 'site_reach_time', 'slump_at_site_reach_time', 'any_admixture_addedatsite', 'any_water_added_at_site', 'after_addition_of_water', 'admixture_slumpmm', 'pour_start_time', 'pour_completed_time', 'plant_return_time'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Engineer Name',
            'date' => 'Date',
            'customer_id' => 'Customer Name',
            'project_manager_id' => 'Project Manager',
            'site_id' => 'Site Name',
            'section_id' => 'Section Name',
            'qty' => 'Quantity',
            'unit' => 'Unit',
            'isPumping' => 'Pumping',
            'isDumping' => 'Dumping',
            'vehicle_interval' => 'Vehicle Interval',
            'tentetive_time' => 'Tentetive Time',
            'confirmed_time' => 'Confirmed Time',
            'plant_id' => 'Plant Name',
            'additional_if_any' => 'Additional If Any',
            'status' => 'Status',
            'reason' => 'Reason',
            'isSIApproved' => 'SI approved',
            'isPMApproved' => 'PM approved',
            'isAdminApproved' => 'Admin Approved',
            'mix_type' => 'Mix Type',
            'mix_no' => 'Mix No',
            'vehicle_no' => 'Vehicle No',
            'name_of_driver' => 'Name Of Driver',
            'name_of_helper' => 'Name Of Helper',
            'plant_dispatch_time' => 'Plant Dispatch Time',
            'slump_at_plant_mm' => 'Slump At Plant Mm',
            'site_reach_time' => 'Site Reach Time',
            'slump_at_site_reach_time' => 'Slump At Site Reach Time',
            'any_admixture_addedatsite' => 'Any Admixture Addedatsite',
            'any_water_added_at_site' => 'Any Water Added At Site',
            'after_addition_of_water' => 'After Addition Of Water',
            'admixture_slumpmm' => 'Admixture Slumpmm',
            'pour_start_time' => 'Pour Start Time',
            'pour_completed_time' => 'Pour Completed Time',
            'plant_return_time' => 'Plant Return Time',
            'isdeleted' => 'Isdeleted',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public function getEngineer()
    {
        return $this->hasOne(User::className(),['id' => 'user_id'])->select('username')->scalar();
    }

    public function getProjectManager()
    {
        return $this->hasOne(User::className(),['id' => 'project_manager_id'])->select('username')->scalar();
    }

    public function getSite()
    {
        return $this->hasOne(Sites::className(),['id' => 'site_id'])->select('name')->scalar();
    }

    public function getSection()
    {
        return $this->hasOne(Sections::className(),['id' => 'section_id'])->select('section_name')->scalar();
    }

    public function getCustomer()
    {
        return $this->hasOne(Customers::className(),['id' => 'customer_id'])->select('name')->scalar();
    }
    
}
