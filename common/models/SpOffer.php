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
        return '{{%Sp_Offer}}';
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
            [['offer_id', 'price',], 'required'],
            [['is_type', 'is_using'], 'string'],
            [['offer_id', 'user_id', 'price'], 'string', 'max' => 85],

            [['is_using'], 'default', 'value' => 'Off'],
            [['path'], 'default', 'value' => null],
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
            'path'       => '图片',
            'content'       => '相关内容',
            'is_type'    => '类型',
            'is_using'   => '是否启用',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }

    /**
     * 列表
     *
     * @param null $offerid
     * @param null $user_id
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function findByAll($offerid = null, $user_id = null)
    {

        // 初始化
        $where = array();

        if (!empty($offerid))
            $where = ['offer_id' => $offerid];

        if (!empty($user_id))
            $where = ['user_id' => $user_id];

        return static::find()->where($where)
            ->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
