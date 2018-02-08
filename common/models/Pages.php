<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%pages}}".
 *
 * @property int $id
 * @property string $page_id 页面ID
 * @property string $c_key 页面ID
 * @property string $name 单页面名称
 * @property string $content 单页面内容
 * @property string $path 单页面路径
 * @property string $is_type 单页面类型, 列表, 内容
 * @property string $is_using 是否可用
 * @property string $created_at
 * @property string $updated_at
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pages}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'c_key', 'm_key', 'is_type', 'is_using'], 'required'],
            [['content', 'is_type', 'is_using'], 'string'],
            [['page_id', 'c_key', 'm_key'], 'string', 'max' => 55],
            [['path'], 'string', 'max' => 255],
            [['page_id'], 'unique'],

            [['parent_id', 'content', 'path'], 'default', 'value' => null],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_id'    => '单页面ID',
            'c_key'      => '单页面分类',
            'm_key'      => '对应的菜单',
            'content'    => '单页面内容',
            'path'       => '单页面路径',
            'is_type'    => '类型',
            'is_using'   => '是否启用',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }

    /**
     * 所有内容
     *
     * @param null $where
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function findByAll($ckey = null)
    {

        return static::find()->where([static::tableName() . '.is_using' => 'On', static::tableName() . '.parent_id' => $ckey])
            ->orderBy(static::tableName() . '.page_id', SORT_DESC)
            ->joinWith('menu')
            ->asArray()
            ->all();
    }

    /**
     * 查找
     *
     * @param $id
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function findByOne($id)
    {
        return static::find()->where([static::tableName() . '.is_using' => 'On', static::tableName() . '.page_id' => $id])
            ->orderBy(static::tableName() . '.page_id', SORT_DESC)
            ->joinWith('menu')
            ->asArray()
            ->one();
    }

    /**
     * 针对菜单的保存功能
     *
     * @param $mkey
     * @return bool
     */
    public function saveData($mkey)
    {

        if (empty($mkey))
            return false;

        $this->page_id = time() . '_' . rand(0000, 9999);
        $this->m_key = $mkey;
        $this->c_key = $mkey;
        $this->is_type = 'content';
        $this->is_using = 'On';

        return $this->save() ? true : false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['m_key' => 'm_key']);
    }
}
