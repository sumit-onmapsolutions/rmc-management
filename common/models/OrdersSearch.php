<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Orders;

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
            [['id', 'user_id', 'customer_id', 'cid', 'project_manager_id', 'site_id', 'section_id', 'qty', 'unit', 'isPumping', 'isDumping', 'plant_id', 'status', 'isSIApproved', 'isPMApproved', 'isAdminApproved', 'isdeleted', 'created_by', 'updated_by'], 'integer'],
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
        $query = Orders::find();

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
            'project_manager_id' => $this->project_manager_id,
            'site_id' => $this->site_id,
            'section_id' => $this->section_id,
            'qty' => $this->qty,
            'unit' => $this->unit,
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
