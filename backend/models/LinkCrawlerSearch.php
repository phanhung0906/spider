<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * LinkCrawlerSearch represents the model behind the search form about `backend\models\LinkCrawler`.
 */
class LinkCrawlerSearch extends LinkCrawler
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'name', 'max_page', 'wait_second', 'category_id', 'status', 'expired_day', 'list_url', 'list_pattern_url', 'website_name', 'last_run'], 'safe'],
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
        $query = LinkCrawler::find();

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

        if ($this->status) {
            $query->andFilterWhere(['status' => (int)$this->status]);
        }

        if ($this->website_name) {
            $query->andFilterWhere(['website_name' => $this->website_name]);
        }

        if ($this->last_run && strpos($this->last_run, '-') !== false) {
            list($start_date, $end_date) = explode(' - ', $this->last_run);
            $query->andFilterWhere(['between', 'last_run', strtotime($start_date), strtotime($end_date)]);
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'max_page', $this->max_page])
            ->andFilterWhere(['like', 'wait_second', $this->wait_second])
            ->andFilterWhere(['like', 'category_id', $this->category_id])
            ->andFilterWhere(['like', 'expired_day', $this->expired_day])
            ->andFilterWhere(['like', 'list_url', $this->list_url])
            ->andFilterWhere(['like', 'list_pattern_url', $this->list_pattern_url]);

        return $dataProvider;
    }
}
