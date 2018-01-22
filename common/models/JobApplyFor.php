<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%job_apply_for}}".
 *
 * @property int $id
 * @property string $user_id 用户ID
 * @property string $job_id 招聘ID
 * @property string $is_using 是否启用
 * @property string $created_at
 * @property string $updated_at
 */
class JobApplyFor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%job_apply_for}}';
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
            [['user_id', 'job_id', 'is_using'], 'required'],
            [['is_using'], 'string'],
            [['user_id', 'job_id'], 'string', 'max' => 85],
            [['user_id'], 'unique'],
            [['job_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id'    => '应聘用户',
            'job_id'     => '应聘工作',
            'is_using'   => '是否审核通过',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }
}
