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
        return '{{%rules}}';
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
            [['name', 'is_using'], 'required'],
            [['description', 'is_using'], 'string'],
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
            'name'        => '规则',
            'data'        => '规则内容',
            'description' => 'Description',
            'is_using'    => 'Is Using',
            'created_at'  => 'Created At',
            'updated_at'  => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemrps()
    {
        return $this->hasMany(Itemrp::className(), ['rule_name' => 'name']);
    }
}
