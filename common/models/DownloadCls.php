<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%download_classify}}".
 *
 * @property int $id
 * @property string $c_key 分类KEY
 * @property string $sort_id 排序
 * @property string $name 名称
 * @property string $description 描述
 * @property string $keywords 关键字
 * @property string $json_data Json数据
 * @property string $parent_id 父类ID
 * @property string $is_using 是否启用
 * @property string $created_at
 * @property string $updated_at
 */
class DownloadCls extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%download_classify}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_key', 'sort_id', 'name', 'keywords', 'parent_id', 'is_using'], 'required'],
            [['sort_id',], 'integer'],
            [['description', 'is_using'], 'string'],
            [['c_key', 'parent_id'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 85],
            [['keywords'], 'string', 'max' => 155],
            [['json_data'], 'string', 'max' => 255],
            [['c_key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_key'       => '下载分类',
            'sort_id'     => '排序',
            'name'        => '分类名称',
            'description' => '分类描述',
            'keywords'    => '分类关键词',
            'json_data'   => 'Json 内容',
            'parent_id'   => '父类',
            'is_using'    => '是否启用',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }

    static public function findByAll()
    {
        return static::find()->where(['is_using' => 'On'])->orderBy('sort_id', SORT_DESC)->all();
    }

    /**
     * 获取分类( 针对选项框)
     *
     * @param null $pid
     * @return array
     */
    public static function getCls($pid = null)
    {
        // 初始化
        $result = array();

        $data = static::findByAll();

        foreach ($data as $value) {
            $result[ $value['c_key'] ] = $value['name'];
        }

        return $result;
    }
}
