<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%slide}}".
 *
 * @property integer $slide_id
 * @property string $c_key
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
            [['c_key', 'path', 'is_using'], 'required'],
            [['description', 'is_using'], 'string'],
            [['c_key'], 'string', 'max' => 55],
            [['path'], 'string', 'max' => 255],
            [['c_key', 'path'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_key'       => '对应的单页面',
            'path'        => '路径',
            'description' => '描述',
            'is_using'    => '是否启用',
        ];
    }

    public function getData($pagekey)
    {
        if (empty($pagekey))
            return false;

        $result = static::findOne(['is_using' => 'On', 'c_key' => $pagekey]);

        if (empty($result))
            return false;

        $dataSlide = explode(',', $result->path);

        return $dataSlide;
    }
}
