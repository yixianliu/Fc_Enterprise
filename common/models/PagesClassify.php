<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%pages_classify}}".
 *
 * @property integer $id
 * @property string $c_key
 * @property string $sort_id
 * @property string $name
 * @property string $description
 * @property string $keywords
 * @property string $json_data
 * @property string $parent_id
 * @property string $is_using
 * @property string $created_at
 * @property string $updated_at
 */
class PagesClassify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pages_classify}}';
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
            [['name'], 'string', 'max' => 85],
            [['keywords'], 'string', 'max' => 155],
            [['json_data'], 'string', 'max' => 255],
            [['c_key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'c_key'       => '页面关键KEY',
            'sort_id'     => '页面排序',
            'name'        => '单页面名称',
            'description' => '单页面描述',
            'keywords'    => '单页面关键词',
            'json_data'   => 'Json 数据',
            'parent_id'   => '父类KEY',
            'is_using'    => '是否启用',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }
}
