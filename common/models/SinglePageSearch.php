<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SinglePage;

/**
 * SinglePageSearch represents the model behind the search form about `common\models\SinglePage`.
 */
class SinglePageSearch extends SinglePage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'name', 'content', 'path', 'is_using'], 'safe'],
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
        $query = SinglePage::find();

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

        $query->andFilterWhere(['like', 'page_id', $this->page_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'is_using', $this->is_using]);

        return $dataProvider;
    }
}
