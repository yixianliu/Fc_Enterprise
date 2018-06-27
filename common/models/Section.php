<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%section}}".
 *
 * @property integer $id
 * @property string $s_key
 * @property string $sort_id
 * @property string $name
 * @property string $description
 * @property string $keywords
 * @property string $json_data
 * @property string $parent_key
 * @property string $is_ad
 * @property string $is_post
 * @property string $is_using
 * @property string $published
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Section}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['s_key', 'sort_id', 'name', 'json_data', 'parent_key', 'is_ad', 'is_post', 'is_using'], 'required'],
            [['sort_id'], 'integer'],
            [['description', 'is_ad', 'is_post', 'is_using'], 'string'],
            [['s_key', 'keywords', 'json_data', 'parent_key'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 85],
            [['name'], 'unique'],
            [['s_key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            's_key'       => '版块关键KEY',
            'sort_id'     => '版块排序',
            'name'        => '版块名称',
            'description' => '版块描述',
            'keywords'    => '版块关键词',
            'json_data'   => 'Json 数据',
            'parent_key'  => '父类版块',
            'is_ad'       => 'Is Ad',
            'is_post'     => 'Is Post',
            'is_using'    => '是否启用',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }
}
