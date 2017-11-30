<?php

namespace common\models;

use Yii;
use common\models\Rules;
use common\models\User;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%itemrp}}".
 *
 * @property string $name
 * @property string $type
 * @property string $rule_name
 * @property string $data
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ItemRelated[] $itemRelateds
 * @property ItemRelated[] $itemRelateds0
 * @property ItemRp[] $children
 * @property ItemRp[] $parents
 * @property Rules $ruleName
 * @property User[] $users
 */
class ItemRp extends \yii\db\ActiveRecord
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
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['type'], 'integer'],
            [['data'], 'string'],
            [['name'], 'string', 'max' => 85],
            [['rule_name'], 'string', 'max' => 65],
            [['description'], 'string', 'max' => 255],
            [['rule_name'], 'exist', 'skipOnError' => true, 'targetClass' => Rules::className(), 'targetAttribute' => ['rule_name' => 'name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name'        => '名称',
            'type'        => '类型',
            'rule_name'   => '规则名称',
            'data'        => '数据',
            'description' => '描述',
            'created_at'  => '添加时间',
            'updated_at'  => '修改时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemRelateds()
    {
        return $this->hasMany(ItemRelated::className(), ['parent' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemRelateds0()
    {
        return $this->hasMany(ItemRelated::className(), ['child' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(ItemRp::className(), ['name' => 'child'])->viaTable('{{%item_related}}', ['parent' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParents()
    {
        return $this->hasMany(ItemRp::className(), ['name' => 'parent'])->viaTable('{{%item_related}}', ['child' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuleName()
    {
        return $this->hasOne(Rules::className(), ['name' => 'rule_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['r_key' => 'name']);
    }
}
