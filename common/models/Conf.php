<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%conf}}".
 *
 * @property int $conf_id
 * @property string $c_key 配置关键字KEY
 * @property string $name 名称
 * @property string $parameter 值 / 参数
 * @property string $description 描述
 * @property string $is_using 是否可用
 * @property string $published 发布时间
 */
class Conf extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%conf}}';
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
     * 网站配置数据
     *
     * @param null $status
     * @return $this
     */
    public static function findByData($status = null, $language = 'cn')
    {

        $array = !empty($status) ? ['is_using' => $status] : ['!=', 'is_using', 'null'];

        return static::find()
            ->where($array)
            ->andWhere(['is_language' => $language])
            ->asArray()
            ->all();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_key', 'name', 'parameter', 'is_using', 'is_language'], 'required'],
            [['description', 'is_using', 'is_language'], 'string'],
            [['c_key'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 80],
            [['parameter'], 'string', 'max' => 255],
            [['c_key'], 'unique'],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_key'       => '网站配置关键KEY',
            'name'        => '配置名称',
            'parameter'   => '配置值',
            'description' => '配置描述',
            'is_using'    => '是否启用',
            'is_language' => '语言分类',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }
}
