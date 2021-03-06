<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%conf}}".
 *
 * @property int    $conf_id
 * @property string $c_key       配置关键字KEY
 * @property string $name        名称
 * @property string $parameter   值 / 参数
 * @property string $description 描述
 * @property string $is_using    是否可用
 * @property string $published   发布时间
 */
class Conf extends \yii\db\ActiveRecord
{

    public static $webDefault = 'cn';

    public static $systemDefault = 'web';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Conf}}';
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
            [['c_key', 'name', 'parameter'], 'required'],
            [['description', 'is_using', 'is_language', 'is_type'], 'string'],
            [['c_key'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 80],
            [['parameter'], 'string', 'max' => 255],

            [['is_language'], 'default', 'value' => static::$webDefault],
            [['is_type'], 'default', 'value' => static::$systemDefault],
            [['is_using'], 'default', 'value' => 'On'],
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
            'is_type'     => '配置类型',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }

    /**
     * 网站配置数据
     *
     * @param null   $status
     * @param string $language
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function findByData($status = null, $language = null)
    {

        $array = !empty($status) ? ['is_using' => $status] : ['!=', 'is_using', 'null'];

        $language = empty($language) ? Language::$default_key : $language;

        return static::find()->where($array)
            ->andWhere(['is_language' => $language])
            ->asArray()
            ->all();
    }

    /**
     * 整合后的配置数组
     *
     * @param string $language
     * @param string $status
     *
     * @return array
     */
    public static function findByConfArray($language = null, $status = 'On')
    {

        $language = empty($language) ? Language::$default_key : $language;

        $data = static::findByData($status, $language);

        // 初始化
        $confArray = [];

        foreach ($data as $value) {
            $confArray[ $value['c_key'] ] = $value['parameter'];
        }

        return $confArray;
    }

}
