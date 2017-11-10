<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property string $news_id
 * @property string $user_id
 * @property string $c_key
 * @property string $sort_id
 * @property string $title
 * @property string $content
 * @property string $introduction
 * @property string $keywords
 * @property string $praise
 * @property string $forward
 * @property string $collection
 * @property string $share
 * @property string $attention
 * @property string $is_promote
 * @property string $is_hot
 * @property string $is_winnow
 * @property string $is_recommend
 * @property string $is_audit
 * @property string $is_comments
 * @property string $is_img
 * @property string $is_thumb
 * @property string $published
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'user_id', 'c_key', 'title', 'content', 'is_promote', 'is_hot', 'is_winnow', 'is_recommend', 'is_audit', 'is_comments', 'is_img', 'is_thumb', 'published'], 'required'],
            [['sort_id', 'praise', 'forward', 'collection', 'share', 'attention', 'published'], 'integer'],
            [['content', 'is_promote', 'is_hot', 'is_winnow', 'is_recommend', 'is_audit', 'is_comments', 'is_img', 'is_thumb'], 'string'],
            [['news_id'], 'string', 'max' => 85],
            [['user_id', 'c_key'], 'string', 'max' => 55],
            [['title'], 'string', 'max' => 125],
            [['introduction'], 'string', 'max' => 255],
            [['keywords'], 'string', 'max' => 120],
            [['news_id'], 'unique'],
            [['title'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id'      => '新闻 ID',
            'user_id'      => '用户',
            'c_key'        => '新闻分类',
            'sort_id'      => '新闻排序',
            'title'        => '新闻标题',
            'content'      => 'Content',
            'introduction' => 'Introduction',
            'keywords'     => 'Keywords',
            'praise'       => 'Praise',
            'forward'      => 'Forward',
            'collection'   => 'Collection',
            'share'        => 'Share',
            'attention'    => 'Attention',
            'is_promote'   => 'Is Promote',
            'is_hot'       => 'Is Hot',
            'is_winnow'    => '精选状态',
            'is_recommend' => 'Is Recommend',
            'is_audit'     => 'Is Audit',
            'is_comments'  => 'Is Comments',
            'is_img'       => 'Is Img',
            'is_thumb'     => 'Is Thumb',
            'published'    => '发布时间',
        ];
    }
}
