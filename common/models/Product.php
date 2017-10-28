<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property string $product_id
 * @property string $user_id
 * @property string $l_key
 * @property string $c_key
 * @property string $s_key
 * @property string $title
 * @property string $content
 * @property string $price
 * @property string $discount
 * @property string $introduction
 * @property string $keywords
 * @property string $path
 * @property string $praise
 * @property string $forward
 * @property string $collection
 * @property string $share
 * @property string $attention
 * @property string $is_promote
 * @property string $is_hot
 * @property string $is_classic
 * @property string $is_winnow
 * @property string $is_recommend
 * @property string $is_audit
 * @property string $is_field
 * @property string $is_comments
 * @property string $is_img
 * @property string $is_thumb
 * @property string $grade
 * @property string $user_grade
 * @property string $published
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['l_key', 'c_key', 's_key', 'title', 'content', 'price', 'is_promote', 'is_hot', 'is_classic', 'is_winnow', 'is_recommend', 'is_audit', 'is_field', 'is_comments', 'is_img', 'is_thumb', 'grade', 'user_grade', 'published'], 'required'],
            [['content', 'is_promote', 'is_hot', 'is_classic', 'is_winnow', 'is_recommend', 'is_audit', 'is_field', 'is_comments', 'is_img', 'is_thumb'], 'string'],
            [['price', 'discount', 'praise', 'forward', 'collection', 'share', 'attention', 'grade', 'user_grade', 'published'], 'integer'],
            [['product_id'], 'string', 'max' => 85],
            [['user_id', 'l_key', 'c_key', 's_key', 'path'], 'string', 'max' => 55],
            [['title'], 'string', 'max' => 125],
            [['introduction'], 'string', 'max' => 255],
            [['keywords'], 'string', 'max' => 120],
            [['product_id'], 'unique'],
            [['title'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'l_key'        => '等级角色',
            'c_key'        => '产品分类',
            's_key'        => '所属版块',
            'title'        => '产品标题',
            'content'      => '产品内容',
            'price'        => '产品价格',
            'discount'     => '折扣价',
            'introduction' => '产品描述',
            'keywords'     => '产品关键词',
            'path'         => '产品文件夹路径',
            'praise'       => 'Praise',
            'forward'      => 'Forward',
            'collection'   => 'Collection',
            'share'        => 'Share',
            'attention'    => 'Attention',
            'is_promote'   => 'Is Promote',
            'is_hot'       => 'Is Hot',
            'is_classic'   => 'Is Classic',
            'is_winnow'    => 'Is Winnow',
            'is_recommend' => 'Is Recommend',
            'is_audit'     => 'Is Audit',
            'is_field'     => 'Is Field',
            'is_comments'  => 'Is Comments',
            'is_img'       => 'Is Img',
            'is_thumb'     => 'Is Thumb',
            'grade'        => 'Grade',
            'user_grade'   => 'User Grade',
        ];
    }
}
