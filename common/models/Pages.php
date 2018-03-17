<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

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
            [['page_id', 'm_key', 'is_using'], 'required'],
            [['content', 'is_using', 'parent_id',], 'string'],
            [['page_id', 'm_key', 'parent_id',], 'string', 'max' => 55],
            [['path'], 'string', 'max' => 255],
            [['page_id', 'm_key',], 'unique'],

            [['parent_id', 'content', 'path'], 'default', 'value' => null],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_id'    => '单页面 ID',
            'c_key'      => '单页面分类',
            'm_key'      => '对应的菜单',
            'content'    => '单页面内容',
            'path'       => '单页面路径',
            'parent_id'  => '父类',
            'is_using'   => '是否启用',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }

    /**
     * 所有内容
     *
     * @param null $ckey
     * @return array|Pages[]|\yii\db\ActiveRecord[]
     */
    public static function findByAll($ckey = null)
    {

        $ckey = empty($ckey) ? 'C0' : $ckey;

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
     * @param string $type
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function findByOne($id, $type = 'page_id')
    {

        if ($type == 'page_id') {
            $where = [static::tableName() . '.is_using' => 'On', static::tableName() . '.page_id' => $id];
        } else {
            $where = [static::tableName() . '.is_using' => 'On', static::tableName() . '.' . $type => $id];
        }

        return static::find()->where($where)
            ->orderBy(static::tableName() . '.page_id', SORT_DESC)
            ->joinWith('menu')
            ->asArray()
            ->one();
    }

    /**
     * 针对菜单的保存功能(菜单控制器)
     *
     * @param $mkey 菜单关键KEY
     * @param $page_id 页面PAGE ID
     * @param $type
     * @param $parent_id
     * @return bool
     */
    public function saveData($mkey, $page_id)
    {

        if (empty($mkey) || empty($page_id))
            return false;

        $this->page_id = $page_id;
        $this->m_key = $mkey;
        $this->p_key = $mkey;
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
