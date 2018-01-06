<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%pages_tpl_file}}".
 *
 * @property int $id
 * @property string $name 名称
 * @property string $description 描述
 * @property string $path 文件目录
 * @property string $is_using 是否启用
 * @property string $created_at
 * @property string $updated_at
 */
class PagesTplFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pages_tpl_file}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'path', 'is_using'], 'required'],
            [['description', 'is_using'], 'string'],
            [['name'], 'string', 'max' => 85],
            [['path'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['path'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name'        => '文件名称',
            'description' => '文件描述',
            'path'        => '文件路径',
            'is_using'    => '是否启用',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }
}
