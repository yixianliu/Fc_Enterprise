<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%download_classify}}".
 *
 * @property int $id
 * @property string $c_key 分类KEY
 * @property string $sort_id 排序
 * @property string $name 名称
 * @property string $description 描述
 * @property string $keywords 关键字
 * @property string $json_data Json数据
 * @property string $parent_id 父类ID
 * @property string $is_using 是否启用
 * @property string $created_at
 * @property string $updated_at
 */
class DownloadCls extends \yii\db\ActiveRecord
{

    static public $parent_cly_id = 'C0';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Download_Classify}}';
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
            [['name', 'parent_id'], 'required'],
            [['sort_id',], 'integer'],
            [['description', 'is_using'], 'string'],
            [['parent_id'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 85],
            [['keywords'], 'string', 'max' => 155],
            [['json_data'], 'string', 'max' => 255],
            [['c_key'], 'unique'],

            [['sort_id',], 'default', 'value' => 1],
            [['is_using',], 'default', 'value' => 'On'],
            [['keywords', 'json_data'], 'default', 'value' => '暂无 !!'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'c_key'       => '下载分类关键KEY',
            'sort_id'     => '分类排序',
            'name'        => '分类名称',
            'description' => '分类描述',
            'keywords'    => '分类关键词',
            'json_data'   => 'Json 内容',
            'parent_id'   => '父类',
            'is_using'    => '是否启用',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }

    static public function findByAll($parent_id = null)
    {

        $parent_id = empty($parent_id) ? static::$parent_cly_id : $parent_id;

        return static::find()->where(['is_using' => 'On', 'parent_id' => $parent_id])
            ->orderBy('sort_id', SORT_DESC)
            ->asArray()
            ->all();
    }

    /**
     * 获取分类( 针对选项框)
     *
     * @param string $one
     * @return array
     */
    public static function getClsSelect($one = 'On')
    {

        // 产品分类
        $dataClassify = static::findByAll(static::$parent_cly_id);

        // 初始化
        $result = array();

        if ($one == 'On')
            $result[ static::$parent_cly_id ] = '顶级分类 !!';

        foreach ($dataClassify as $key => $value) {

            $result[ $value['c_key'] ] = $value['name'];

            $child = static::recursionClsSelect($value);

            if (empty($child))
                continue;

            $result = array_merge($result, $child);
        }

        return $result;
    }

    /**
     * 递归无限分类(选项框)
     *
     * @param $data
     * @param int $num
     */
    public static function recursionClsSelect($data, $num = 1)
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
                $symbol .= '――';
            }
        }

        foreach ($child as $key => $value) {

            $result[ $value['c_key'] ] = $symbol . $value['name'];

            $childData = static::recursionClsSelect($value, ($num + 1));

            if (empty($childData))
                continue;

            $result = array_merge($result, $childData);

        }

        return $result;
    }

    /**
     * 获取分类
     *
     * @param string $parent_id
     * @return array|bool
     */
    static public function getCls()
    {

        // 初始化
        $result = array();

        $parent = static::findByAll();

        foreach ($parent as $key => $value) {
            $result[ $key ] = static::recursionCls($value);
        }

        return $result;
    }

    /**
     * 无限分类
     *
     * @param $data
     */
    static public function recursionCls($data)
    {

        if (empty($data))
            return;

        $result = $data;

        $child = static::findByAll($data['c_key']);

        if (empty($child))
            return $result;

        foreach ($child as $value) {
            $result['child'][] = static::recursionCls($value);
        }

        return $result;
    }
}
