<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%sp_offer}}".
 *
 * @property int $id
 * @property string $offer_id 对应的类目 ID
 * @property string $user_id 用户ID
 * @property string $price 提交价格
 * @property string $is_type 类型,采购方还是供应方
 * @property string $is_using 是否启用
 * @property string $created_at
 * @property string $updated_at
 */
class SpOffer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sp_offer}}';
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
            [['offer_id', 'user_id', 'price', 'is_type', 'is_using'], 'required'],
            [['is_type', 'is_using'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['offer_id', 'user_id', 'price'], 'string', 'max' => 85],
            [['user_id'], 'unique'],
            [['offer_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'offer_id'   => '相关采购供应对应编号',
            'user_id'    => '用户 ID',
            'price'      => '价格',
            'is_type'    => '类型',
            'is_using'   => '是否启用',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }
}
