<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%news_classify}}".
 *
 * @property integer $id
 * @property string $c_key
 * @property string $sort_id
 * @property string $r_key
 * @property string $name
 * @property string $description
 * @property string $keywords
 * @property string $ico_class
 * @property string $parent_id
 * @property string $is_using
 * @property string $published
 */
class NewsClassify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news_classify}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_key', 'sort_id', 'r_key', 'name', 'keywords', 'parent_id', 'is_using'], 'required'],
            [['sort_id'], 'integer'],
            [['description', 'is_using'], 'string'],
            [['c_key', 'r_key', 'ico_class', 'parent_id'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 85],
            [['keywords'], 'string', 'max' => 155],
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
            'c_key' => 'C Key',
            'sort_id' => 'Sort ID',
            'r_key' => 'R Key',
            'name' => 'Name',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'ico_class' => 'Ico Class',
            'parent_id' => 'Parent ID',
            'is_using' => 'Is Using',
        ];
    }
}
