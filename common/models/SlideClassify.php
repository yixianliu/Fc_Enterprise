<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%slide_classify}}".
 *
 * @property int $id
 * @property string $c_key 幻灯片关键KEY
 * @property string $name 分类名称
 * @property string $description 描述
 * @property string $is_using 是否可用
 * @property string $created_at
 * @property string $updated_at
 */
class SlideClassify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Slide_Classify}}';
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
            [['c_key', 'name', 'is_using'], 'required'],
            [['description', 'is_using'], 'string'],
            [['c_key'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 255],
            [['c_key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_key'       => '幻灯片关键KEY',
            'name'        => '分类名称',
            'description' => '分类描述',
            'is_using'    => '是否启用',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }
}
