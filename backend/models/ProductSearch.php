<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;

/**
 * ProductSearch represents the model behind the search form about `common\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'price', 'discount', 'praise', 'forward', 'collection', 'share', 'attention', 'grade', 'user_grade'], 'integer'],
            [['product_id', 'user_id', 'l_key', 'c_key', 's_key', 'title', 'content', 'introduction', 'keywords', 'path', 'is_promote', 'is_hot', 'is_classic', 'is_winnow', 'is_recommend', 'is_audit', 'is_field', 'is_comments', 'is_img', 'is_thumb'], 'safe'],
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
        $query = Product::find();

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
            'id'         => $this->id,
            'price'      => $this->price,
            'discount'   => $this->discount,
            'praise'     => $this->praise,
            'forward'    => $this->forward,
            'collection' => $this->collection,
            'share'      => $this->share,
            'attention'  => $this->attention,
            'grade'      => $this->grade,
            'user_grade' => $this->user_grade,
        ]);

        $query->andFilterWhere(['like', 'product_id', $this->product_id])
            ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'l_key', $this->l_key])
            ->andFilterWhere(['like', 'c_key', $this->c_key])
            ->andFilterWhere(['like', 's_key', $this->s_key])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'introduction', $this->introduction])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'is_promote', $this->is_promote])
            ->andFilterWhere(['like', 'is_hot', $this->is_hot])
            ->andFilterWhere(['like', 'is_classic', $this->is_classic])
            ->andFilterWhere(['like', 'is_winnow', $this->is_winnow])
            ->andFilterWhere(['like', 'is_recommend', $this->is_recommend])
            ->andFilterWhere(['like', 'is_audit', $this->is_audit])
            ->andFilterWhere(['like', 'is_field', $this->is_field])
            ->andFilterWhere(['like', 'is_comments', $this->is_comments])
            ->andFilterWhere(['like', 'is_img', $this->is_img])
            ->andFilterWhere(['like', 'is_thumb', $this->is_thumb]);

        return $dataProvider;
    }
}
