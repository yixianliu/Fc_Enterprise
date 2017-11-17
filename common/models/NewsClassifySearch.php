<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NewsClassify;

/**
 * NewsClassifySearch represents the model behind the search form about `common\models\NewsClassify`.
 */
class NewsClassifySearch extends NewsClassify
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort_id'], 'integer'],
            [['c_key', 'name', 'description', 'keywords', 'ico_class', 'parent_id', 'is_using'], 'safe'],
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
        $query = NewsClassify::find();

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
            'sort_id' => $this->sort_id,
            'published' => $this->published,
        ]);

        $query->andFilterWhere(['like', 'c_key', $this->c_key])
            ->andFilterWhere(['like', 'r_key', $this->r_key])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'ico_class', $this->ico_class])
            ->andFilterWhere(['like', 'parent_id', $this->parent_id])
            ->andFilterWhere(['like', 'is_using', $this->is_using]);

        return $dataProvider;
    }
}
