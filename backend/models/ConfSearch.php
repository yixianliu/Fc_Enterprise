<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/3
 * Time: 15:34
 */

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Conf;

/**
 * ItemRpSearch represents the model behind the search form about `common\models\ItemRp`.
 */
class ConfSearch extends Conf
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_key', 'parameter', 'name', 'description'], 'safe'],
            [['created_at', 'updated_at'], 'integer'],
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
    public function search($params, $type = 'cn')
    {

        if ($type == 'system') {
            $query = Conf::find()->where(['is_language' => null]);
        } else {
            $query = Conf::find()->where(['is_language' => $type]);
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

        $query->andFilterWhere(['like', 'c_key', $this->c_key])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'parameter', $this->parameter])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}