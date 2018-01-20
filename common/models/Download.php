<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%download}}".
 *
 * @property int $id
 * @property string $c_key 分类KEY
 * @property string $title 下载标题
 * @property string $path 文件路径
 * @property string $content 文件描述
 * @property string $is_using 是否启用
 * @property string $created_at
 * @property string $updated_at
 */
class Download extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%download}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_key', 'title', 'path', 'content', 'is_using'], 'required'],
            [['content', 'is_using'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['c_key'], 'string', 'max' => 55],
            [['title', 'path'], 'string', 'max' => 85],
            [['title'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_key'      => 'C Key',
            'title'      => 'Title',
            'path'       => 'Path',
            'content'    => 'Content',
            'is_using'   => 'Is Using',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
