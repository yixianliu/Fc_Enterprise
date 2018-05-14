<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%auth_role_permisson}}".
 *
 * @property string $id
 * @property string $parent 角色名称
 * @property string $child 权限名称
 */
class AuthRolePermisson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%auth_role_permisson}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'string', 'max' => 80],
            [['child'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'parent' => '角色',
            'child'  => '权限',
        ];
    }

    /**
     * 查找所有
     *
     * @param null $parent
     * @return array|AuthRolePermisson[]|Rules[]|\yii\db\ActiveRecord[]
     */
    public static function findByAll($parent = null)
    {
        return static::find()->where(['parent' => $parent])->all();
    }


}
