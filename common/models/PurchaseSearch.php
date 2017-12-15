<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Purchase;

/**
 * PurchaseSearch represents the model behind the search form about `common\models\Purchase`.
 */
class PurchaseSearch extends Purchase
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'num', 'start_at', 'end_at'], 'integer'],
            [['purchase_id', 'user_id', 'title', 'content', 'path', 'price', 'type', 'is_status', 'is_using'], 'safe'],
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

        $query = Purchase::find();

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
            'num' => $this->num,
            'unit' => $this->unit,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'purchase_id', $this->purchase_id])
            ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'is_status', $this->is_status])
            ->andFilterWhere(['like', 'is_using', $this->is_using]);

        return $dataProvider;
    }
}
