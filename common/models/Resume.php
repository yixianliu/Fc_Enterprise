<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%resume}}".
 *
 * @property int $id
 * @property string $user_id 用户ID
 * @property string $title 简历标题
 * @property string $content 简历内容
 * @property string $path 上传简历路径
 * @property string $is_using 是否启用
 * @property string $created_at
 * @property string $updated_at
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Resume}}';
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
            [['user_id', 'title', 'content'], 'required'],
            [['content', 'is_using', 'path'], 'string'],
            [['user_id'], 'string', 'max' => 85],
            [['title'], 'string', 'max' => 125],
            [['path'], 'string', 'max' => 500],
            [['user_id'], 'unique'],

            [['is_using',], 'default', 'value' => 'On'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id'    => '用户 ID',
            'title'      => '简历标题',
            'content'    => '简历内容',
            'path'       => '简历文件路径',
            'is_using'   => '是否审核通过',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }
}
