<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%role}}".
 *
 * @property integer $role_id
 * @property string $sort_id
 * @property string $rkey
 * @property string $name
 * @property string $exp
 * @property string $description
 * @property string $ico_class
 * @property string $is_using
 * @property string $published
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort_id', 'rkey', 'name', 'exp', 'description', 'is_using', 'published'], 'required'],
            [['sort_id', 'exp', 'published'], 'integer'],
            [['is_using'], 'string'],
            [['rkey'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 85],
            [['description'], 'string', 'max' => 255],
            [['ico_class'], 'string', 'max' => 125],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'sort_id' => '角色排序',
            'rkey' => '角色关键KEY',
            'name' => '角色名称',
            'exp' => 'Exp',
            'description' => 'Description',
            'ico_class' => 'Ico Class',
            'is_using' => 'Is Using',
            'published' => 'Published',
        ];
    }
}
