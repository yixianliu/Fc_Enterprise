<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property string  $news_id
 * @property string  $user_id
 * @property string  $c_key
 * @property string  $sort_id
 * @property string  $title
 * @property string  $content
 * @property string  $introduction
 * @property string  $keywords
 * @property string  $praise
 * @property string  $forward
 * @property string  $collection
 * @property string  $share
 * @property string  $attention
 * @property string  $is_promote
 * @property string  $is_hot
 * @property string  $is_winnow
 * @property string  $is_recommend
 * @property string  $is_audit
 * @property string  $is_comments
 * @property string  $is_img
 * @property string  $is_thumb
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%News}}';
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
            [['c_key', 'title', 'content'], 'required'],
            [['sort_id', 'praise', 'forward', 'collection', 'share', 'attention'], 'integer'],
            [['content', 'is_promote', 'is_hot', 'is_winnow', 'is_recommend', 'is_audit', 'is_comments', 'is_img', 'is_thumb'], 'string'],
            [['news_id'], 'string', 'max' => 85],
            [['c_key'], 'string', 'max' => 55],
            [['title'], 'string', 'max' => 125],
            [['introduction', 'images', 'path'], 'string', 'max' => 255],
            [['keywords'], 'string', 'max' => 120],
            [['news_id'], 'unique'],
            [['title'], 'unique'],

            // 若 "level" 为空，则设其为 1
            [['is_thumb', 'is_img', 'is_winnow', 'is_hot', 'is_promote', 'is_recommend',], 'default', 'value' => 'Off'],
            [['is_audit', 'is_comments'], 'default', 'value' => 'On'],
            [['introduction'], 'default', 'value' => null],
            [['sort_id'], 'default', 'value' => 1],
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
            'content'      => '新闻内容',
            'introduction' => '新闻导读',
            'keywords'     => '新闻关键词',
            'path'         => '新闻图片',
            'images'       => '新闻缩略图',
            'praise'       => '赞',
            'forward'      => '转发',
            'collection'   => '收藏',
            'share'        => '分享次数',
            'attention'    => '关注',
            'is_language'  => '语言类别',
            'is_promote'   => '推广状态',
            'is_hot'       => '热门状态',
            'is_winnow'    => '精选状态',
            'is_recommend' => '推荐状态',
            'is_audit'     => '是否审核',
            'is_comments'  => '是否开启评论',
            'is_img'       => '是否上传图片',
            'is_thumb'     => '缩略图',
            'created_at'   => '添加数据时间',
            'updated_at'   => '更新数据时间',
        ];
    }

    /**
     * 查询新闻列表
     *
     * @param null $num
     *
     * @return array|News[]|int|string|\yii\db\ActiveRecord[]
     */
    public static function findByAll($num = null)
    {

        if (!empty($num) && is_numeric($num)) {

            return static::find()->where(['is_audit' => 'On'])
                ->orderBy('sort_id', SORT_DESC)
                ->asArray()
                ->limit($num)
                ->all();
        }

        // 所有数据
        return static::find()->where(['is_audit' => 'On'])
            ->orderBy('news_id', SORT_DESC)
            ->asArray()
            ->all();

    }

    /**
     * 查询推荐新闻
     *
     * @param int $num
     *
     * @return \yii\db\BatchQueryResult
     */
    public static function findByRecommend($num = 5)
    {

        return static::find()->where(['is_audit' => 'On', 'is_recommend' => 'On'])
            ->orderBy('news_id', SORT_DESC)
            ->asArray()
            ->limit($num)
            ->all();

    }

    /**
     * 查询热门新闻
     *
     * @param int $num
     *
     * @return int|string
     */
    public static function findByHot($num = 1)
    {

        // 只有一条记录
        if ($num == 1) {

            return static::find()->where(['is_audit' => 'On', 'is_hot' => 'On'])
                ->orderBy('news_id', SORT_DESC)
                ->joinWith('user')
                ->joinWith('admin')
                ->asArray()
                ->one();

        }

        return static::find()->where(['is_audit' => 'On', 'is_hot' => 'On'])
            ->orderBy('news_id', SORT_DESC)
            ->joinWith('user')
            ->joinWith('admin')
            ->asArray()
            ->limit($num)
            ->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasMany(User::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasMany(Management::className(), ['user_id' => 'user_id']);
    }

}
