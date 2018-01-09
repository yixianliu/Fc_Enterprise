<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%single_page}}".
 *
 * @property integer $id
 * @property string $page_id
 * @property string $name
 * @property string $content
 * @property string $path
 * @property string $is_using
 * @property string $created_at
 * @property string $updated_at
 */
class SinglePage extends \yii\db\ActiveRecord
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
            [['page_id', 'name', 'is_using', 'c_key', 'is_type'], 'required'],
            [['content', 'is_using'], 'string'],
            [['page_id'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 80],
            [['path'], 'string', 'max' => 255],
            [['page_id'], 'unique'],

            [['path'], 'default', 'value' => ''],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_id'    => '单页面关键 ID',
            'name'       => '单页面名称',
            'c_key'      => '单页面所属分类',
            'content'    => '单页面内容',
            'path'       => '单页面路径',
            'is_using'   => '是否启用',
            'is_type'    => '内容类型',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }
}
