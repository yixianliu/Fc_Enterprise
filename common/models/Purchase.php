<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%purchase}}".
 *
 * @property integer $id
 * @property string $purchase_id
 * @property string $user_id
 * @property string $title
 * @property string $content
 * @property string $path
 * @property string $price
 * @property string $num
 * @property string $unit
 * @property string $is_type
 * @property string $is_status
 * @property string $start_at
 * @property string $end_at
 * @property string $is_using
 * @property string $created_at
 * @property string $updated_at
 */
class Purchase extends \yii\db\ActiveRecord
{

    public $is_send;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%purchase}}';
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
            [['purchase_id', 'c_key', 'user_id', 'title', 'content', 'price', 'num', 'unit', 'is_type', 'is_status', 'start_at', 'end_at', 'is_using', 'start_at', 'end_at'], 'required'],
            [['content', 'is_type', 'is_status', 'is_using', 'unit', 'path'], 'string'],
            [['num'], 'integer'],
            [['purchase_id', 'user_id', 'price'], 'string', 'max' => 85],
            [['title',], 'string', 'max' => 125],
            [['path',], 'string', 'max' => 1500],
            [['purchase_id'], 'unique'],

            // 默认
            [['is_send_msg'], 'default', 'value' => 'Off'],
            [['path'], 'default', 'value' => ''],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'purchase_id' => '采购编号',
            'c_key'       => '采购分类',
            'user_id'     => '发布者',
            'title'       => '采购标题',
            'content'     => '采购内容',
            'path'        => '采购相关文件',
            'price'       => '采购价格',
            'num'         => '采购数量',
            'unit'        => '单位',
            'is_type'     => '类型',
            'is_status'   => '状态',
            'start_at'    => '开始时间',
            'end_at'      => '结束时间',
            'is_using'    => '是否启用',
            'is_send_msg' => '群发短信',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }
}
