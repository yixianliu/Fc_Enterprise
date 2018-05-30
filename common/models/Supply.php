<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%supply}}".
 *
 * @property int $id
 * @property string $c_key 分类KEY
 * @property string $supply_id 编号
 * @property string $user_id 用户ID
 * @property string $title 标题
 * @property string $content 内容
 * @property string $path 上传文件
 * @property string $price 目标价格
 * @property string $num 数量
 * @property string $unit 单位
 * @property string $is_type 类型 (分为长期 / 短期)
 * @property string $is_status 采购状态
 * @property string $start_at 起始时间
 * @property string $end_at 结束时间
 * @property string $is_send_msg 是否群发短信
 * @property string $is_using 是否启用
 * @property string $created_at
 * @property string $updated_at
 */
class Supply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Supply}}';
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
            [['c_key', 'supply_id', 'user_id', 'title', 'content', 'price', 'start_at', 'end_at'], 'required'],
            [['content', 'is_type', 'is_status', 'is_send_msg', 'is_using'], 'string'],
            [['num'], 'integer'],
            [['c_key', 'unit'], 'string', 'max' => 55],
            [['supply_id', 'user_id', 'price'], 'string', 'max' => 85],
            [['title', 'path'], 'string', 'max' => 125],
            [['supply_id'], 'unique'],

            // 默认
            [['is_send_msg',], 'default', 'value' => 'Off'],
            [['path'], 'default', 'value' => null],
            [['unit',], 'default', 'value' => '个'],
            [['num',], 'default', 'value' => 1],
            [['is_type',], 'default', 'value' => 'Long'],
            [['is_status', 'is_using',], 'default', 'value' => 'On'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_key'       => '供应信息分类',
            'supply_id'   => '信息编号',
            'user_id'     => '用户 ID',
            'title'       => '供应信息标题',
            'content'     => '供应信息内容',
            'path'        => '供应信息路径',
            'price'       => '产品价钱',
            'num'         => '数量',
            'unit'        => '单位',
            'is_type'     => '是否启用',
            'is_status'   => '供应状态',
            'start_at'    => '开始时间',
            'end_at'      => '结束时间',
            'is_send_msg' => '群发短信',
            'is_using'    => '是否启用',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPsb()
    {
        return $this->hasMany(PsbClassify::className(), ['c_key' => 'c_key']);
    }
}
