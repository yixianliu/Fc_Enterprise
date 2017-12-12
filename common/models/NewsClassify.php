<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%news_classify}}".
 *
 * @property integer $id
 * @property string $c_key
 * @property string $sort_id
 * @property string $name
 * @property string $description
 * @property string $keywords
 * @property string $ico_class
 * @property string $parent_id
 * @property string $is_using
 */
class NewsClassify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news_classify}}';
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
            [['c_key', 'sort_id', 'name', 'keywords', 'parent_id', 'is_using'], 'required'],
            [['sort_id'], 'integer'],
            [['description', 'is_using'], 'string'],
            [['c_key', 'parent_id'], 'string', 'max' => 55],
            [['json_data'], 'string', 'max' => 1000],
            [['name'], 'string', 'max' => 85],
            [['keywords'], 'string', 'max' => 155],
            [['c_key'], 'unique'],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_key'       => '分类关键KEY',
            'sort_id'     => '分类排序',
            'name'        => '分类名称',
            'description' => '分类描述',
            'keywords'    => '分类关键词',
            'json_data'   => '分类 Json 参数',
            'parent_id'   => '分类父类',
            'is_using'    => '是否启用',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }
}