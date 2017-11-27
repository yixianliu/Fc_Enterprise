<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%section}}".
 *
 * @property integer $id
 * @property string $s_key
 * @property string $sort_id
 * @property string $name
 * @property string $description
 * @property string $keywords
 * @property string $ico_class
 * @property string $parent_key
 * @property string $is_ad
 * @property string $is_post
 * @property string $is_using
 * @property string $published
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%section}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['s_key', 'sort_id', 'name', 'ico_class', 'parent_key', 'is_ad', 'is_post', 'is_using', 'published'], 'required'],
            [['sort_id', 'published'], 'integer'],
            [['description', 'is_ad', 'is_post', 'is_using'], 'string'],
            [['s_key', 'keywords', 'ico_class', 'parent_key'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 85],
            [['name'], 'unique'],
            [['s_key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            's_key'       => '版块关键KEY',
            'sort_id'     => '版块排序',
            'name'        => '版块名称',
            'description' => 'Description',
            'keywords'    => 'Keywords',
            'ico_class'   => 'Ico Class',
            'parent_key'  => 'Parent Key',
            'is_ad'       => 'Is Ad',
            'is_post'     => 'Is Post',
            'is_using'    => 'Is Using',
            'created_at'   => '添加数据时间',
            'updated_at'   => '更新数据时间',
        ];
    }
}
