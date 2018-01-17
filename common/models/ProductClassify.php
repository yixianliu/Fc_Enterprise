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
            [['c_key', 'sort_id', 'name', 'parent_id', 'is_using'], 'required'],
            [['sort_id'], 'integer'],
            [['description', 'is_using'], 'string'],
            [['c_key', 'keywords', 'json_data', 'parent_id'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 85],
            [['c_key'], 'unique'],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_key'          => '分类关键KEY',
            'sort_id'        => '分类排序',
            'name'           => '分类名称',
            'description'    => '分类描述',
            'keywords'       => '分类关键词',
            'json_data'      => '分类内容',
            'parent_id'      => '父类',
            'is_using'       => '是否启用',
            'created_at	' => '添加数据时间',
            'updated_at	' => '更新数据时间',
        ];
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

        $parent = ProductClassify::findAll(['parent_id' => $parent_id]);

        foreach ($parent as $key => $value) {
            $result[ $key ] = $this->recursionProduct($value->toArray());
        }

        return $result;
    }

    /**
     * 递归分类
     *
     * @param $data
     */
    public function recursionProduct($data)
    {
        if (empty($data))
            return;

        $result = $data;

        $child = ProductClassify::findAll(['parent_id' => $data['c_key']]);

        if (empty($child))
            return $result;

        foreach ($child as $value) {
            $result['child'][] = $this->recursionProduct($value->toArray());
        }

        return $result;
    }

    /**
     * 选项框
     *
     * @param $data
     * @param int $num
     */
    public function recursionProductSelect($data, $num = 1)
    {

        if (empty($data))
            return;

        // 初始化
        $result = array();
        $symbol = null;

        $child = ProductClassify::findAll(['parent_id' => $data['c_key']]);

        if (empty($child))
            return;

        if ($num != 0) {
            for ($i = 0; $i <= $num; $i++) {
                $symbol .= '――';
            }
        }

        foreach ($child as $key => $value) {

            $result[ $value['c_key'] ] = $symbol . $value['name'];

            $childData = $this->recursionProductSelect($value->toArray(), ($num + 1));

            if (empty($childData))
                continue;

            $result = array_merge($result, $childData);

        }

        return $result;
    }
}
