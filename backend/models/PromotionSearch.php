<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Promotion;

/**
 * PromotionSearch represents the model behind the search form of `common\models\Promotion`.
 */
class PromotionSearch extends Promotion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'aff_link', 'banners', 'categories', 'content', 'coupons', 'domain', 'end_time', 'id', 'image', 'link', 'merchant', 'name', 'start_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Promotion::find();

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

        if ($this->start_time && strpos($this->start_time, '-') !== false) {
            list($start_date, $end_date) = explode(' - ', $this->start_time);
            $query->andFilterWhere(['between', 'start_time', strtotime($start_date), strtotime($end_date)]);
        }

        if ($this->end_time && strpos($this->end_time, '-') !== false) {
            list($start_date, $end_date) = explode(' - ', $this->end_time);
            $query->andFilterWhere(['between', 'end_time', strtotime($start_date), strtotime($end_date)]);
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'aff_link', $this->aff_link])
            ->andFilterWhere(['like', 'banners', $this->banners])
            ->andFilterWhere(['like', 'categories', $this->categories])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'coupons', $this->coupons])
            ->andFilterWhere(['like', 'domain', $this->domain])
            ->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'merchant', $this->merchant])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
