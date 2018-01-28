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
        return '{{%nav_classify}}';
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
            [['c_key', 'p_key', 'sort_id', 'name', 'is_using'], 'required'],
            [['sort_id'], 'integer'],
            [['description', 'is_using'], 'string'],
            [['c_key', 'p_key', 'parent_id'], 'string', 'max' => 55],
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
            'c_key'       => '导航分类关键KEY',
            'p_key'       => '产品分类KEY',
            'sort_id'     => '排序',
            'name'        => '分类名称',
            'description' => '分类描述',
            'keywords'    => '分类关键词',
            'json_data'   => 'Json 内容',
            'parent_id'   => '父类',
            'is_using'    => '是否启用',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }

    public static function findByAll()
    {
        return static::find()->where(['parent_id' => static::$parent_id])->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasMany(ProductClassify::className(), ['c_key' => 'p_key']);
    }
}
