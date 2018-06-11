<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%news_classify}}".
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
class NewsClassify extends \yii\db\ActiveRecord
{

    public static $parent_cly_id = 'C0';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%News_Classify}}';
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
            [['name', 'parent_id',], 'required'],
            [['sort_id'], 'integer'],
            [['description', 'is_using'], 'string'],
            [['c_key', 'parent_id'], 'string', 'max' => 55],
            [['json_data'], 'string', 'max' => 1000],
            [['name'], 'string', 'max' => 85],
            [['keywords'], 'string', 'max' => 155],
            [['name'], 'unique'],

            [['sort_id',], 'default', 'value' => 1],
            [['keywords', 'description'], 'default', 'value' => '暂无 !!'],
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
            'json_data'   => '分类 Json 参数',
            'parent_id'   => '分类父类',
            'is_using'    => '是否启用',
            'is_language' => '语言类别',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }

    static public function findByAll($parent_id = null)
    {

        $parent_id = empty($parent_id) ? static::$parent_cly_id : $parent_id;

        return static::find()
            ->where(['parent_id' => $parent_id])
            ->orderBy('sort_id', SORT_DESC)
            ->asArray()
            ->all();
    }

    /**
     * 获取分类(选项框)
     *
     * @param string $one
     * @return array
     */
    public function getClsSelect($one = 'Off')
    {

        // 产品分类
        $dataClassify = static::findByAll(static::$parent_cly_id);

        // 初始化
        $result = array();

        // 产品分类
        $Cls = new NewsClassify();

        if ($one == 'On')
            $result[ static::$parent_cly_id ] = '顶级分类 !!';

        foreach ($dataClassify as $key => $value) {

            $result[ $value['c_key'] ] = $value['name'];

            $child = $Cls->recursionClsSelect($value);

            if (empty($child))
                continue;

            $result = array_merge($result, $child);
        }

        return $result;
    }

    /**
     * 获取分类
     *
     * @param string $parent_id
     * @return array|bool
     */
    public function getCls($parent_id = null)
    {

        $parent_id = empty($parent_id) ? static::$parent_cly_id : $parent_id;

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
     * 无限分类(选项框)
     *
     * @param $data
     * @param int $num
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
