<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\News;

/**
 * NewsSearch represents the model behind the search form about `common\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sort_id', 'praise', 'forward', 'collection', 'share', 'attention', 'published'], 'integer'],
            [['news_id', 'user_id', 'c_key', 'title', 'content', 'introduction', 'keywords', 'is_promote', 'is_hot', 'is_winnow', 'is_recommend', 'is_audit', 'is_comments', 'is_img', 'is_thumb'], 'safe'],
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
        $query = News::find();

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
            'praise' => $this->praise,
            'forward' => $this->forward,
            'collection' => $this->collection,
            'share' => $this->share,
            'attention' => $this->attention,
            'published' => $this->published,
        ]);

        $query->andFilterWhere(['like', 'news_id', $this->news_id])
            ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'c_key', $this->c_key])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'introduction', $this->introduction])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'is_promote', $this->is_promote])
            ->andFilterWhere(['like', 'is_hot', $this->is_hot])
            ->andFilterWhere(['like', 'is_winnow', $this->is_winnow])
            ->andFilterWhere(['like', 'is_recommend', $this->is_recommend])
            ->andFilterWhere(['like', 'is_audit', $this->is_audit])
            ->andFilterWhere(['like', 'is_comments', $this->is_comments])
            ->andFilterWhere(['like', 'is_img', $this->is_img])
            ->andFilterWhere(['like', 'is_thumb', $this->is_thumb]);

        return $dataProvider;
    }
}
