<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;

class ProductSearch extends Product
{
    public function rules()
    {
        return [
            [['_id', 'name', 'slug', 'price', 'status', 'summary', 'description', 'aff_url', 'original_url', 'category_id', 'begin_date', 'end_date', 'website_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if ($this->status) {
            $query->andFilterWhere(['status' => (string)$this->status]);
        }

        if ($this->begin_date && strpos($this->begin_date, '-') !== false) {
            list($start_date, $end_date) = explode(' - ', $this->begin_date);
            $query->andFilterWhere(['between', 'begin_date', strtotime($start_date), strtotime($end_date)]);
        }

        if ($this->end_date && strpos($this->end_date, '-') !== false) {
            list($start_date, $end_date) = explode(' - ', $this->end_date);
            $query->andFilterWhere(['between', 'end_date', strtotime($start_date), strtotime($end_date)]);
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'website_name', $this->website_name])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'original_url', $this->original_url])
            ->andFilterWhere(['like', 'category_id', $this->category_id]);

        return $dataProvider;
    }
}
