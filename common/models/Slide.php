<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%slide}}".
 *
 * @property integer $slide_id
 * @property string $page_id
 * @property string $path
 * @property string $description
 * @property string $is_using
 */
class Slide extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%slide}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'path', 'is_using'], 'required'],
            [['description', 'is_using'], 'string'],
            [['page_id'], 'string', 'max' => 55],
            [['path'], 'string', 'max' => 255],
            [['page_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'slide_id'    => '幻灯片编号',
            'page_id'     => '对应的单页面',
            'path'        => '路径',
            'description' => '描述',
            'is_using'    => '是否启用',
        ];
    }
}
