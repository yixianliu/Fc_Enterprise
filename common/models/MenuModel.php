<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%menu_model}}".
 *
 * @property int $id
 * @property string $model_key 菜单模型
 * @property string $sort_id 排序ID
 * @property string $url_key Url 模型
 * @property string $name 模型名称
 * @property string $is_using 是否启用
 * @property string $created_at
 * @property string $updated_at
 */
class MenuModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu_model}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_key', 'sort_id', 'url_key', 'name', 'is_using', 'created_at', 'updated_at'], 'required'],
            [['sort_id', 'created_at', 'updated_at'], 'integer'],
            [['is_using'], 'string'],
            [['model_key'], 'string', 'max' => 55],
            [['url_key', 'name'], 'string', 'max' => 85],
            [['model_key'], 'unique'],
            [['url_key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'model_key'  => '模型关键KEY',
            'sort_id'    => '模型排序',
            'url_key'    => '模型链接Key',
            'name'       => '模型名称',
            'is_using'   => '是否启用',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }
}
