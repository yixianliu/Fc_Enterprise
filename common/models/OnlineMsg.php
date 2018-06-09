<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%online_msg}}".
 *
 * @property int $id
 * @property string $user_id 账号
 * @property string $email 邮箱
 * @property string $telephone 联系电话
 * @property string $address 联系地址
 * @property string $title 留言标题
 * @property string $content 留言内容
 * @property string $is_audit 是否审核
 * @property int $created_at
 * @property int $updated_at
 */
class OnlineMsg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%online_msg}}';
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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'content', 'email'], 'required'],
            [['content', 'is_audit'], 'string'],
            [['user_id', 'email', 'telephone'], 'string', 'max' => 85],
            [['address'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 155],
            ['email', 'email'],

            [['address'], 'default', 'value' => null],
            [['is_audit',], 'default', 'value' => 'On'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id'    => '用户名称',
            'email'      => '邮件地址',
            'telephone'  => '手机号码',
            'address'    => '联系地址',
            'title'      => '标题',
            'content'    => '内容',
            'is_audit'   => '审核状态',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }
}
