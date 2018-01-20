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
            [['sort_id', 'created_at', 'updated_at'], 'integer'],
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
            'c_key'       => 'C Key',
            'sort_id'     => 'Sort ID',
            'name'        => 'Name',
            'description' => 'Description',
            'keywords'    => 'Keywords',
            'json_data'   => 'Json Data',
            'parent_id'   => 'Parent ID',
            'is_using'    => 'Is Using',
            'created_at'  => 'Created At',
            'updated_at'  => 'Updated At',
        ];
    }
}
