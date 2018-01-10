<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%job}}".
 *
 * @property integer $id
 * @property string $job_id
 * @property string $user_id
 * @property string $title
 * @property string $content
 * @property string $keywords
 * @property string $path
 * @property string $images
 * @property string $is_audit
 * @property string $created_at
 * @property string $updated_at
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%job}}';
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
            [['job_id', 'user_id', 'title', 'content', 'is_audit'], 'required'],
            [['content', 'is_audit'], 'string'],
            [['job_id'], 'string', 'max' => 85],
            [['user_id'], 'string', 'max' => 55],
            [['title', 'path'], 'string', 'max' => 125],
            [['keywords'], 'string', 'max' => 120],
            [['images'], 'string', 'max' => 255],
            [['job_id'], 'unique'],
            [['title'], 'unique'],

            // 审核
            [['is_audit'], 'default', 'value' => 'Off'],
        ];
    }
final
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_id'     => '招聘 ID',
            'user_id'    => '发布者 ID',
            'title'      => '招聘标题',
            'content'    => '招聘内容',
            'keywords'   => '招聘键词',
            'images'     => '招聘相关图片',
            'is_audit'   => '是否审核通过',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }
}
