<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%rules}}".
 *
 * @property string $name
 * @property string $data
 * @property string $description
 * @property string $is_using
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Itemrp[] $itemrps
 */
class Rules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_rule}}';
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
            [['name'], 'required'],
            [['name'], 'string', 'max' => 85],
            [['data'], 'string', 'max' => 255],
            [['data'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name'       => '规则名称',
            'data'       => '规则 Json 内容',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }

    public static function findByAll()
    {
        return static::find()->orderBy('name', SORT_DESC)
            ->asArray()
            ->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemRp()
    {
        return $this->hasMany(ItemRp::className(), ['rule_name' => 'name']);
    }
}
