<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%pages}}".
 *
 * @property int $id
 * @property string $page_id 页面ID
 * @property string $c_key 页面ID
 * @property string $name 单页面名称
 * @property string $content 单页面内容
 * @property string $path 单页面路径
 * @property string $is_type 单页面类型, 列表, 内容
 * @property string $is_using 是否可用
 * @property string $created_at
 * @property string $updated_at
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pages}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'c_key', 'name', 'path', 'is_type', 'is_using'], 'required'],
            [['content', 'is_type', 'is_using'], 'string'],
            [['page_id', 'c_key'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 80],
            [['path'], 'string', 'max' => 255],
            [['page_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_id'    => '单页面ID',
            'c_key'      => '单页面分类',
            'name'       => '单页面名称',
            'content'    => '单页面内容',
            'path'       => '单页面路径',
            'is_type'    => '类型',
            'is_using'   => '是否启用',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }

    /**
     * 所有内容
     *
     * @param $key
     * @return array|bool|\yii\db\ActiveRecord[]
     */
    public static function findByAll($key)
    {

        if (empty($key))
            return false;

        return static::find()->where(['c_key' => $key])
            ->orderBy('page_id', SORT_DESC)
            ->asArray()
            ->all();
    }
}
