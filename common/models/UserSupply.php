<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%user_supply}}".
 *
 * @property int $id
 * @property string $user_id 用户ID
 * @property string $name 企业名称
 * @property string $content 企业简介
 * @property string $path 公司图片
 * @property string $created_at
 * @property string $updated_at
 */
class UserSupply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_supply}}';
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
            [['name', 'content'], 'required'],
            [['content', 'path'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['user_id'], 'string', 'max' => 55],
            [['name', 'path'], 'string', 'max' => 125],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name'       => 'Name',
            'content'    => 'Content',
            'path'       => 'Path',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
