<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%pages_classify}}".
 *
 * @property integer $id
 * @property string $c_key
 * @property string $sort_id
 * @property string $name
 * @property string $description
 * @property string $keywords
 * @property string $json_data
 * @property string $parent_id
 * @property string $is_using
 * @property string $created_at
 * @property string $updated_at
 */
class PagesClassify extends \yii\db\ActiveRecord
{

    static public $parent_id = 'C0';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pages_classify}}';
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
            [['sort_id', 'name', 'keywords', 'parent_id', 'is_using'], 'required'],
            [['sort_id'], 'integer'],
            [['description', 'is_using'], 'string'],
            [['parent_id'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 85],
            [['keywords'], 'string', 'max' => 155],
            [['json_data'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sort_id'     => '分类排序',
            'name'        => '分类名称',
            'description' => '分类描述',
            'keywords'    => '分类关键词',
            'json_data'   => 'Json 数据',
            'parent_id'   => '父类',
            'is_using'    => '是否启用',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }

    static public function findByAll($parent_id = null)
    {

        $parent_id = empty($parent_id) ? static::$parent_id : $parent_id;

        return static::find()->where([static::tableName() . '.parent_id' => $parent_id])
            ->joinWith('menu')
            ->orderBy('sort_id', SORT_DESC)
            ->asArray()
            ->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['custom_key' => 'c_key']);
    }

    /**
     * 获取分类
     *
     * @param string $parent_id
     * @return array|bool
     */
    public function getCls($parent_id = null)
    {

        $parent_id = empty($parent_id) ? $this->parent_id : $parent_id;

        // 初始化
        $result = array();

        $parent = static::findByAll($parent_id);

        foreach ($parent as $key => $value) {
            $result[ $key ] = $this->recursionCls($value);
        }

        return $result;
    }

    /**
     * 无限分类
     *
     * @param $data
     */
    public function recursionCls($data)
    {
        if (empty($data))
            return;

        $result = $data;

        $child = static::findByAll($data['c_key']);

        if (empty($child))
            return $result;

        foreach ($child as $value) {
            $result['child'][] = $this->recursionCls($value);
        }

        return $result;
    }

    /**
     * 获取分类 (选项卡)
     *
     * @param null $parent_id
     * @return array
     */
    public function getClsSelect($parent_id = null)
    {
        $parent_id = empty($parent_id) ? static::$parent_id : $parent_id;

        // 产品分类
        $dataClassify = self::findByAll($parent_id);

        // 初始化
        $result = array();

        $result[ $this->parent_id ] = '顶级分类 !!';

        foreach ($dataClassify as $key => $value) {

            $result[ $value['c_key'] ] = $value['name'];

            $child = $this->recursionPagesSelect($value);

            if (empty($child))
                continue;

            $result = array_merge($result, $child);
        }

        return $result;
    }

    /**
     * 分类递归选择 (选项卡)
     *
     * @param $data
     * @param int $num
     * @return array|void
     */
    public function recursionPagesSelect($data, $num = 1)
    {

        if (empty($data))
            return;

        // 初始化
        $result = array();
        $symbol = null;

        $child = self::findByAll($data['c_key']);

        if (empty($child))
            return;

        if ($num != 0) {
            for ($i = 0; $i <= $num; $i++) {
                $symbol .= '――――';
            }
        }

        foreach ($child as $key => $value) {

            $result[ $value['c_key'] ] = $symbol . $value['name'];

            $childData = $this->recursionPagesSelect($value, ($num + 1));

            if (empty($childData))
                continue;

            $result = array_merge($result, $childData);

        }

        return $result;
    }
}
