<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%power}}".
 *
 * @property integer $id
 * @property string $p_key
 * @property string $name
 * @property string $description
 * @property string $rules
 * @property string $group
 * @property string $is_using
 * @property string $published
 */
class Power extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%itemrp}}';
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
            [['p_key', 'name', 'is_using', 'published'], 'required'],
            [['description', 'is_using'], 'string'],
            [['published'], 'integer'],
            [['p_key'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 85],
            [['rules', 'group'], 'string', 'max' => 255],
            [['p_key'], 'unique'],
            [['rules'], 'unique'],
            [['group'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_key'       => '权限关键KEY',
            'name'        => '权限名称',
            'description' => '权限描述',
            'rules'       => '权限规则(Url)',
            'group'       => '权限分组',
            'is_using'    => '权限状态',
        ];
    }
}
