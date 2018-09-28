<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%product}}".
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Product}}';
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
            [['c_key', 'title', 'content', 'user_id',], 'required'],
            [['title', 'content', 'is_promote', 'is_hot', 'is_classic', 'is_winnow', 'is_recommend', 'is_using', 'is_comments', 'images', 'thumbnail'], 'string'],
            [['price', 'discount', 'praise', 'forward', 'collection', 'share', 'attention', 'grade', 'user_grade'], 'integer'],
            [['images', 'thumbnail'], 'string', 'max' => 255],
            [['c_key', 's_key', 'product_id'], 'string', 'max' => 85],
            [['title'], 'string', 'max' => 125],
            [['introduction'], 'string', 'max' => 255],
            [['keywords'], 'string', 'max' => 150],
            [['title', 'product_id'], 'unique'],

            // 默认值
            [['images', 'thumbnail'], 'default', 'value' => null],
            [['s_key'], 'default', 'value' => 'S0'],
            [['price', 'grade', 'user_grade', 'discount'], 'default', 'value' => 0],
            [['is_winnow', 'is_hot', 'is_promote', 'is_classic', 'is_winnow', 'is_recommend'], 'default', 'value' => 'Off'],
            [['is_using', 'is_comments'], 'default', 'value' => 'On'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id'   => '产品编号ID',
            'user_id'      => '用户ID',
            'c_key'        => '产品分类',
            's_key'        => '版块',
            'title'        => '产品标题',
            'content'      => '产品内容',
            'price'        => '产品价格',
            'discount'     => '折扣价',
            'introduction' => '产品导读',
            'keywords'     => '产品关键词',
            'shop_url'     => '产品商城链接',
            'thumbnail'    => '产品缩略图',
            'images'       => '产品图片',
            'praise'       => '赞',
            'forward'      => '转发',
            'collection'   => '收藏',
            'share'        => '分享次数',
            'attention'    => '关注',
            'is_language'  => '语言类别',
            'is_promote'   => '是否设为推广',
            'is_hot'       => '是否设为热门',
            'is_classic'   => '是否设为经典',
            'is_winnow'    => '是否设为精选',
            'is_recommend' => '是否设为推荐',
            'is_using'     => '审核状态',
            'is_comments'  => '是否开启评论',
            'is_img'       => '是否上传图片',
            'grade'        => '产品评分',
            'user_grade'   => '用户评分',
            'created_at'   => '添加数据时间',
            'updated_at'   => '更新数据时间',
        ];
    }

    /**
     * 查找列表
     *
     * @param null $num
     *
     * @return array|News[]|Product[]|\yii\db\ActiveRecord[]
     */
    public static function findByAll($num = null)
    {
        if ( !empty($num) && is_numeric($num) ) {

            return static::find()->where(['is_using' => 'On'])
                ->orderBy('sort_id', SORT_DESC)
                ->asArray()
                ->limit($num)
                ->all();
        }

        // 所有数据
        return static::find()->where(['is_using' => 'On'])
            ->orderBy('sort_id', SORT_DESC)
            ->asArray()
            ->all();
    }

    /**
     * 单条记录
     *
     * @param $id
     *
     * @return array|Product|null|\yii\db\ActiveRecord
     */
    public static function findByOne($id)
    {
        return static::find()->where([static::tableName() . '.is_using' => 'On', static::tableName() . '.product_id' => $id])
            ->joinWith('admin')
            ->one();

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasMany(Management::className(), ['username' => 'user_id']);
    }
}
