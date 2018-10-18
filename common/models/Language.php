<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%language}}".
 *
 * @property int    $id
 * @property string $lang_key  语言关键KEY
 * @property string $name      名称
 * @property string $parameter 值 / 参数
 * @property string $is_using  是否启用
 * @property int    $created_at
 * @property int    $updated_at
 */
class Language extends \yii\db\ActiveRecord
{

    public static $default_key = 'LCN';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%language}}';
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
            [['lang_key', 'name', 'parameter', 'is_using'], 'required'],
            [['is_using'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['lang_key', 'name'], 'string', 'max' => 55],
            [['parameter'], 'string', 'max' => 25],
            [['name'], 'unique'],
            [['lang_key'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lang_key'   => '语言关键KEY',
            'name'       => '语言名称',
            'parameter'  => '语言编号',
            'is_using'   => '是否启用',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }

    /**
     * 列表
     *
     * @param null $key
     *
     * @return array|Conf[]|Language[]|\yii\db\ActiveRecord[]
     */
    public static function findByAll($key = null)
    {

        $key = empty( $key ) ? static::$default_key : $key;

        return static::find()->where( ['lang_key' => $key] )->all();
    }

    /**
     * 判断语言类别
     *
     * @return bool
     */
    public static function isLanguage()
    {

        $data = static::findOne( ['lang_key' => (!Yii::$app->session->has( 'language' ) ? static::$default_key : Yii::$app->session['language'])] );

        if (empty( $data ))
            return false;

        Yii::$app->session->set( 'language', $data->lang_key );

        Yii::$app->language = $data->parameter;

        return true;
    }
}
