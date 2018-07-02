<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%nav_classify}}".
 *
 * @property int $id
 * @property string $c_key 分类KEY
 * @property string $p_key 对应分类KEY
 * @property string $sort_id 排序
 * @property string $name 名称
 * @property string $description 描述
 * @property string $keywords 关键字
 * @property string $json_data Json数据
 * @property string $parent_id 父类ID
 * @property string $is_using 是否启用
 * @property string $created_at
 * @property string $updated_at
 */
class NavClassify extends \yii\db\ActiveRecord
{

    static public $parent_id = 'C0';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Nav_Classify}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_key', 'name'], 'required'],
            [['sort_id'], 'integer'],
            [['description', 'is_using'], 'string'],
            [['parent_id'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 85],
            [['keywords'], 'string', 'max' => 155],
            [['json_data'], 'string', 'max' => 255],
            [['name'], 'unique'],

            [['is_using'], 'default', 'value' => 'On'],
            [['sort_id',], 'default', 'value' => '1'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_key'       => '分类编号',
            'p_key'       => '相关采购分类',
            'sort_id'     => '排序',
            'name'        => '分类名称',
            'description' => '分类描述',
            'keywords'    => '分类关键词',
            'json_data'   => 'Json 内容',
            'parent_id'   => '父类名称',
            'is_using'    => '是否启用',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }

    /**
     * 查询所有
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function findByAll()
    {
        return static::find()->where(['is_using' => 'On'])
            ->orderBy('sort_id', SORT_DESC)
            ->asArray()
            ->all();
    }

    /**
     * 查询导航分类,整合相关分类
     *
     * @return array|NavClassify[]|\yii\db\ActiveRecord[]
     */
    public static function findByData()
    {

        $result = static::find()->where(['is_using' => 'On'])
            ->orderBy('sort_id', SORT_DESC)
            ->asArray()
            ->all();

        foreach ($result as $key => $value) {

            $child = explode(',', $value['p_key']);

            foreach ($child as $valueChild) {

                if (empty($valueChild))
                    continue;

                $result[$key]['child'][] = PsbClassify::findOne(['c_key' => $valueChild]);
            }
        }

        return $result;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasMany(ProductClassify::className(), ['c_key' => 'p_key']);
    }
}
