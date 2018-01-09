<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%pages_list}}".
 *
 * @property int $id
 * @property string $page_id 页面ID
 * @property string $title 列表标题
 * @property string $content 单页面内容
 * @property string $path 单页面路径
 * @property string $is_using 是否可用
 * @property string $created_at
 * @property string $updated_at
 */
class PagesList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pages_list}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'title', 'path', 'is_using', 'created_at', 'updated_at'], 'required'],
            [['content', 'is_using'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['page_id'], 'string', 'max' => 55],
            [['title'], 'string', 'max' => 80],
            [['path'], 'string', 'max' => 255],
            [['title'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'title' => 'Title',
            'content' => 'Content',
            'path' => 'Path',
            'is_using' => 'Is Using',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
