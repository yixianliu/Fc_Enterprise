<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%pages_list}}".
 *
 * @property int $id
 * @property string $page_id 页面ID
 * @property string $title 列表标题
 * @property string $content 单页面内容
 * @property string $path 单页面路径
 * @property string $is_using 是否可用
 * @property string $created_at
 * @property string $updated_at
 */
class PagesList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Pages_List}}';
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
            [['page_id', 'title', 'c_key'], 'required'],
            [['content', 'is_using'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['page_id'], 'string', 'max' => 55],
            [['title'], 'string', 'max' => 80],
            [['path'], 'string', 'max' => 255],
            [['title'], 'unique'],

            [['is_using'], 'default', 'value' => 'On'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_id'    => '单页面名称',
            'title'      => '单页面标题',
            'content'    => '单页面内容',
            'c_key'      => '单页面分类',
            'path'       => '单页面路径',
            'is_using'   => '是否审核通过',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }

    /**
     * 列表
     *
     * @param $id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function findByAll($id)
    {
        return static::find()->where(['page_id' => $id])
            ->asArray()
            ->all();
    }
}
