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

    /**
     * 固定单页面
     *
     * @return array
     */
    public static function getSlideSelect()
    {

        // 初始化
        $result = [];

        // 幻灯片分类
        $dataPageCls = static::findAll( ['is_using' => 'On'] );

        foreach ($dataPageCls as $value) {
            $result[ $value['c_key'] ] = $value['name'];
        }

        // 单页面
        $dataPage = Pages::findByAll();

        foreach ($dataPage as $value) {
            $result[ $value['page_id'] ] = $value['menu']['name'];
        }

        return $result;
    }

    public static function setType()
    {

        // 初始化
        $result = [];

        $type = Yii::$app->request->get( 'type', 'default' );

        if ($type == 'pages') {

            $classify = Menu::findAll( ['model_key' => 'UC1'] );

            foreach ($classify as $value) {
                $result['classify'][ $value->pages->page_id ] = $value->name;
            }
        }

        return $result;
    }
}
