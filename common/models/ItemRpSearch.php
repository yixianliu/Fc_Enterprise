<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ItemRp;

/**
 * ItemRpSearch represents the model behind the search form about `common\models\ItemRp`.
 */
class ItemRpSearch extends ItemRp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'rule_name', 'data', 'description'], 'safe'],
            [['type', 'created_at', 'updated_at'], 'integer'],
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
    public function search($params, $type = null)
    {

        $array = [
            'role'       => 1,
            'permission' => 2,
        ];

        if (empty($type)) {
            $query = ItemRp::find();
        } else {
            $query = ItemRp::find()->where(['type' => $array[ $type ]]);
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
            'type'       => $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'rule_name', $this->rule_name])
            ->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
