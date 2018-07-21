<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SubConcretes;

/**
 * SubConcretesSearch represents the model behind the search form of `common\models\SubConcretes`.
 */
class SubConcretesSearch extends SubConcretes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'concrete_master_id', 'status', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['sub_concrete_name', 'created_at', 'updated_at'], 'safe'],
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
        $query = SubConcretes::find();

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
            'concrete_master_id' => $this->concrete_master_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'is_deleted' => $this->is_deleted,
        ]);

        $query->andFilterWhere(['like', 'sub_concrete_name', $this->sub_concrete_name]);

        return $dataProvider;
    }
}
