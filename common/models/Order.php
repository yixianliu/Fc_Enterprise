<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property int    $id
 * @property string $order_id 订单编号,唯一识别码
 * @property string $user_id  用户ID
 * @property string $title    订单标题
 * @property string $content  订单内容
 * @property string $price    订单价格
 * @property string $images   相关图片
 * @property string $path     相关文件
 * @property string $pay_type 支付方式
 * @property string $is_using 订单状态
 * @property int    $created_at
 * @property int    $updated_at
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'user_id', 'title', 'content', 'price', 'pay_type', 'is_using'], 'required'],
            [['content', 'pay_type', 'is_using'], 'string'],
            [['price', 'created_at', 'updated_at'], 'integer'],
            [['order_id'], 'string', 'max' => 85],
            [['user_id'], 'string', 'max' => 55],
            [['title'], 'string', 'max' => 125],
            [['images', 'path'], 'string', 'max' => 255],
            [['order_id'], 'unique'],
            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id'   => '订单 ID',
            'user_id'    => '用户 ID',
            'title'      => '订单标题',
            'content'    => '订单内容',
            'price'      => '订单价格',
            'images'     => '订单图片',
            'path'       => '订单路径',
            'pay_type'   => '付款类型',
            'is_using'   => '是否审核',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }
}
