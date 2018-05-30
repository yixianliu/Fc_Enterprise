<?php

namespace common\models;

use Yii;

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
            [['c_key', 'bid_id', 'user_id', 'title', 'content', 'price', 'is_send_msg', 'is_using', 'created_at', 'updated_at'], 'required'],
            [['content', 'is_send_msg', 'is_using'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['c_key'], 'string', 'max' => 55],
            [['bid_id', 'user_id', 'price'], 'string', 'max' => 85],
            [['title', 'path'], 'string', 'max' => 125],
            [['bid_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'c_key' => 'C Key',
            'bid_id' => 'Bid ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'content' => 'Content',
            'path' => 'Path',
            'price' => 'Price',
            'is_send_msg' => 'Is Send Msg',
            'is_using' => 'Is Using',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
