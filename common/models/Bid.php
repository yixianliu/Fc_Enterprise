<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%bid}}".
 *
 * @property int $id
 * @property string $c_key 分类KEY
 * @property string $bid_id 编号
 * @property string $user_id 用户ID
 * @property string $title 标题
 * @property string $content 内容
 * @property string $path 上传文件
 * @property string $price 目标价格
 * @property string $is_send_msg 是否群发短信
 * @property string $is_using 是否启用
 * @property string $created_at
 * @property string $updated_at
 */
class Bid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Bid}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_key', 'title', 'content'], 'required'],
            [['content', 'is_send_msg', 'is_using'], 'string'],
            [['price'], 'integer'],
            [['c_key'], 'string', 'max' => 55],
            [['bid_id', 'user_id', 'price'], 'string', 'max' => 85],
            [['title', 'path'], 'string', 'max' => 125],
            [['bid_id'], 'unique'],

            [['price'], 'default', 'value' => 0],
            [['is_send_msg',], 'default', 'value' => 'Off'],
            [['is_using',], 'default', 'value' => 'On'],
        ];
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
    public function attributeLabels()
    {
        return [
            'c_key'       => '招标分类',
            'bid_id'      => '招标编号',
            'user_id'     => '发布用户',
            'title'       => '标题',
            'content'     => '内容',
            'path'        => '招标相关图片',
            'price'       => '招标价格',
            'is_using'    => '是否启用',
            'is_send_msg' => '群发短信',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }
}
