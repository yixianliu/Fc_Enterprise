<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%module}}".
 *
 * @property int    $id
 * @property string $m_key       模块KEY
 * @property string $sort_id     排序
 * @property string $name        名称
 * @property string $description 描述
 * @property string $keywords    关键字
 * @property string $json_data   Json 数据
 * @property string $is_using    是否启用
 * @property int    $created_at
 * @property int    $updated_at
 */
class Module extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%module}}';
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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['m_key', 'name',], 'required'],
            [['sort_id', 'created_at', 'updated_at'], 'integer'],
            [['description', 'is_using'], 'string'],
            [['m_key'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 85],
            [['keywords'], 'string', 'max' => 155],
            [['json_data'], 'string', 'max' => 255],
            [['m_key'], 'unique'],

            // 默认
            [['is_using',], 'default', 'value' => 'On'],
            [['sort_id',], 'default', 'value' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'm_key'       => '模块关键KEY',
            'sort_id'     => 'Sort ID',
            'name'        => 'Name',
            'description' => 'Description',
            'keywords'    => 'Keywords',
            'json_data'   => 'Json Data',
            'is_using'    => '是否审核通过',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }
}
