<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Orders;
use common\models\Sections;
use common\models\Projects;
use common\models\PlantManagers;

/**
 * OrdersSearch represents the model behind the search form of `common\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'customer_id', 'cid', 'project_manager_id', 'site_id', 'section_id', 'isPumping', 'isDumping', 'plant_id', 'status', 'isSIApproved', 'isPMApproved', 'isAdminApproved', 'isdeleted', 'created_by', 'updated_by'], 'integer'],
            [['date', 'vehicle_interval', 'tentetive_time', 'confirmed_time', 'additional_if_any', 'reason', 'mix_type', 'mix_no', 'vehicle_no', 'name_of_driver', 'name_of_helper', 'plant_dispatch_time', 'slump_at_plant_mm', 'site_reach_time', 'slump_at_site_reach_time', 'any_admixture_addedatsite', 'any_water_added_at_site', 'after_addition_of_water', 'admixture_slumpmm', 'pour_start_time', 'pour_completed_time', 'plant_return_time', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
       // for engineers
        if(Yii::$app->user->identity->user_level == 6)
        {
            $query = Orders::find()->where(['user_id' => Yii::$app->user->identity->id]);      
        }

        // for section incharge
        else if(Yii::$app->user->identity->user_level == 4)
        {
            $rows = Sections::find()->select(['id'])->where(['section_incharge_id' => Yii::$app->user->identity->id])->asArray()->all();
            $tempArray = array();
            foreach ($rows as $key=>$value) {
                $tempArray[$key] = $value['id'];
            }
            $query = Orders::find()->where(['section_id' => $tempArray]);
        }

        // for project manager
        else if(Yii::$app->user->identity->user_level == 3)
        {
            $query = Orders::find()->where(['project_manager_id' => Yii::$app->user->identity->id])->andWhere(['isSIApproved'=>1]);      
        }

        // for project head
        else if(Yii::$app->user->identity->user_level == 7)
        {
            $rows = Projects::find()->select(['project_manager_id'])->where(['project_head_id' => Yii::$app->user->identity->id])->asArray()->all();
            $tempArray = array();
            foreach ($rows as $key=>$value) {
                $tempArray[$key] = $value['project_manager_id'];
            }
            $query = Orders::find()->where(['project_manager_id' => $tempArray])->andWhere(['isPMApproved'=>1]);
        }

        // for master
        else if(Yii::$app->user->identity->user_level == 2)
        {
            $query = Orders::find()->where(['isPHApproved' =>1]);      
        }

        // for plant
        /*else if(Yii::$app->user->identity->user_level == 5)
        {
           $rows = PlantManagers::find()->select(['plant_manager_id'])->where(['plant_id' => Yii::$app->user->identity->id])->asArray()->all();
            $tempArray = array();
            foreach ($rows as $key=>$value) {
                echo $tempArray[$key] = $value['plant_id'];
            }
        
            $query = Orders::find()->where(['plant_id' => $tempArray])->andWhere(['isAdminApproved'=>1]);
        }*/

        else   
        {
            $query = Orders::find();
        }
        
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'date' => $this->date,
            'customer_id' => $this->customer_id,
            'cid' => $this->cid,
            'billing_address' => $this->billing_address,
            'gst_details' => $this->gst_details,
            'city' => $this->city,
            'project_manager_id' => $this->project_manager_id, 
            'site_location' => $this->site_location,
            'site_id' => $this->site_id,
            'section_id' => $this->section_id,
            'isPumping' => $this->isPumping,
            'isDumping' => $this->isDumping,
            'plant_id' => $this->plant_id,
            'status' => $this->status,
            'isSIApproved' => $this->isSIApproved,
            'isPMApproved' => $this->isPMApproved,
            'isAdminApproved' => $this->isAdminApproved,
            'isdeleted' => $this->isdeleted,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'vehicle_interval', $this->vehicle_interval])
            ->andFilterWhere(['like', 'tentetive_time', $this->tentetive_time])
            ->andFilterWhere(['like', 'confirmed_time', $this->confirmed_time])
            ->andFilterWhere(['like', 'additional_if_any', $this->additional_if_any])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'mix_type', $this->mix_type])
            ->andFilterWhere(['like', 'mix_no', $this->mix_no])
            ->andFilterWhere(['like', 'vehicle_no', $this->vehicle_no])
            ->andFilterWhere(['like', 'name_of_driver', $this->name_of_driver])
            ->andFilterWhere(['like', 'name_of_helper', $this->name_of_helper])
            ->andFilterWhere(['like', 'plant_dispatch_time', $this->plant_dispatch_time])
            ->andFilterWhere(['like', 'slump_at_plant_mm', $this->slump_at_plant_mm])
            ->andFilterWhere(['like', 'site_reach_time', $this->site_reach_time])
            ->andFilterWhere(['like', 'slump_at_site_reach_time', $this->slump_at_site_reach_time])
            ->andFilterWhere(['like', 'any_admixture_addedatsite', $this->any_admixture_addedatsite])
            ->andFilterWhere(['like', 'any_water_added_at_site', $this->any_water_added_at_site])
            ->andFilterWhere(['like', 'after_addition_of_water', $this->after_addition_of_water])
            ->andFilterWhere(['like', 'admixture_slumpmm', $this->admixture_slumpmm])
            ->andFilterWhere(['like', 'pour_start_time', $this->pour_start_time])
            ->andFilterWhere(['like', 'pour_completed_time', $this->pour_completed_time])
            ->andFilterWhere(['like', 'plant_return_time', $this->plant_return_time]);

        return $dataProvider;
    }
}
