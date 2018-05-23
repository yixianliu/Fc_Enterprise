<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%product_classify}}".
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
 */
class ProductClassify extends \yii\db\ActiveRecord
{

    public static $parent_cly_id = 'C0';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_classify}}';
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
            [['c_key', 'name', 'parent_id'], 'required'],
            [['sort_id'], 'integer'],
            [['description', 'is_using'], 'string'],
            [['c_key', 'keywords', 'json_data', 'parent_id'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 85],
            [['c_key'], 'unique'],
            [['name'], 'unique'],

            [['sort_id',], 'default', 'value' => 1],
            [['is_using',], 'default', 'value' => 'On'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_key'       => '分类关键KEY',
            'sort_id'     => '分类排序',
            'name'        => '分类名称',
            'description' => '分类描述',
            'keywords'    => '分类关键词',
            'json_data'   => 'Json 内容',
            'parent_id'   => '父类名称',
            'is_language' => '语言类别',
            'is_using'    => '是否启用',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }

    /**
     * 所有分类
     *
     * @param null $parent_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function findByAll($parent_id = null)
    {

        $parent_id = empty($parent_id) ? static::$parent_cly_id : $parent_id;

        return static::find()->where(['parent_id' => $parent_id, 'is_using' => 'On'])
            ->orderBy('sort_id', SORT_DESC)
            ->asArray()
            ->all();
    }

    /**
     * 获取分类
     *
     * @param string $parent_id
     * @return array|bool
     */
    public function getCls($parent_id = 'C0')
    {

        // 初始化
        $result = array();

        $parent = static::findByAll(['parent_id' => $parent_id]);

        foreach ($parent as $key => $value) {
            $result[ $key ] = $this->recursionCls($value);
        }

        return $result;
    }

    /**
     * 递归分类
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
     * 获取分类(选项框)
     *
     * @return array
     */
    public function getClsSelect()
    {

        // 初始化
        $result = array();

        // 产品分类
        $dataClassify = static::findByAll(static::$parent_cly_id);

        $result[ static::$parent_cly_id ] = '顶级分类 !!';

        foreach ($dataClassify as $key => $value) {

            $result[ $value['c_key'] ] = $value['name'];

            $child = $this->recursionClsSelect($value);

            if (empty($child))
                continue;

            $result = array_merge($result, $child);
        }

        return $result;
    }

    /**
     * 无限分类(选项框)
     *
     * @param $data
     * @param int $num
     * @return array|void
     */
    public function recursionClsSelect($data, $num = 1)
    {

        if (empty($data))
            return;

        // 初始化
        $result = array();
        $symbol = null;

        $child = static::findByAll($data['c_key']);

        if (empty($child))
            return;

        if ($num != 0) {
            for ($i = 0; $i <= $num; $i++) {
                $symbol .= '――';
            }
        }

        foreach ($child as $key => $value) {

            $result[ $value['c_key'] ] = $symbol . $value['name'];

            $childData = $this->recursionClsSelect($value, ($num + 1));

            if (empty($childData))
                continue;

            $result = array_merge($result, $childData);
        }

        return $result;
    }
}
