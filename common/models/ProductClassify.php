<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%product_classify}}".
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
class ProductClassify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_classify}}';
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
            [['c_key', 'sort_id', 'name', 'parent_id', 'is_using'], 'required'],
            [['sort_id'], 'integer'],
            [['description', 'is_using'], 'string'],
            [['c_key', 'keywords', 'ico_class', 'parent_id'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 85],
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
            'ico_class'   => '分类样式',
            'parent_id'   => '父类',
            'is_using'    => '是否启用',
            'created_at	' => '添加数据时间',
            'updated_at	' => '更新数据时间',
        ];
    }
}
