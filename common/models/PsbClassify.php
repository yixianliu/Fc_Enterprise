<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%psb_classify}}".
 *
 * @property int    $id
 * @property string $c_key       分类KEY
 * @property string $sort_id     排序
 * @property string $name        名称
 * @property string $description 描述
 * @property string $keywords    关键字
 * @property string $json_data   Json数据
 * @property string $parent_id   父类ID
 * @property string $is_using    是否启用
 * @property string $created_at
 * @property string $updated_at
 */
class PsbClassify extends ActiveRecord
{

    static public $parent_cly_id = [
        'Supply'   => 'S0',
        'Purchase' => 'P0',
        'Bid'      => 'B0',
    ];

    static public $parent_cly_name = [
        'Supply'   => '供应类型',
        'Purchase' => '采购类型',
        'Bid'      => '投标类型',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%PSB_Classify}}';
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
            [['name', 'parent_id', 'is_type'], 'required'],
            [['sort_id',], 'integer'],
            [['description', 'is_using'], 'string'],
            [['name', 'c_key', 'parent_id'], 'string', 'max' => 85],
            [['keywords'], 'string', 'max' => 155],
            [['json_data'], 'string', 'max' => 255],

            [['sort_id',], 'default', 'value' => 1],
            [['keywords',], 'default', 'value' => '暂无!!'],
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
            'json_data'   => 'Json 数据',
            'parent_id'   => '所属分类',
            'is_using'    => '是否启用',
            'is_type'     => '分类类型',
            'created_at'  => '添加数据时间',
            'updated_at'  => '更新数据时间',
        ];
    }

    /**
     * 列表
     *
     * @param null   $parent_id
     * @param string $type
     *
     * @return array|PsbClassify[]|ActiveRecord[]
     */
    static public function findByAll($parent_id = null, $type = 'Supply')
    {

        $parent_id = empty( $parent_id ) ? static::$parent_cly_id[ $type ] : $parent_id;

        return static::find()->where( ['parent_id' => $parent_id, 'is_type' => $type] )
            ->orderBy( ['sort_id' => SORT_DESC] )
            ->asArray()
            ->all();
    }

    /**
     * 获取分类 (选项卡)
     *
     * @param string $type
     * @param string $one
     *
     * @return array
     */
    public static function getClsSelect($type = 'Supply', $one = 'On')
    {

        // 初始化
        $result = [];

        // 所有分类
        $dataClassify = static::findByAll( static::$parent_cly_id[ $type ], $type );

        if ($one == 'On') {
            $result[ static::$parent_cly_id[ $type ] ] = '一级分类';
        }

        foreach ($dataClassify as $key => $value) {

            $result[ $value['c_key'] ] = $value['name'];

            $child = static::recursionClsSelect( $value, $type );

            if (empty( $child ))
                continue;

            $result = array_merge( $result, $child );
        }

        return $result;
    }

    /**
     * 无限分类(选项框)
     *
     * @param     $data
     * @param     $type
     * @param int $num
     *
     * @return array|void
     */
    public static function recursionClsSelect($data, $type, $num = 1)
    {

        if (empty( $data ) || empty( $type ))
            return;

        // 初始化
        $result = [];
        $symbol = null;

        $child = static::findByAll( $data['c_key'], $type );

        if (empty( $child ))
            return;

        if ($num != 0) {
            for ($i = 0; $i <= $num; $i++) {
                $symbol .= '--';
            }
        }

        foreach ($child as $key => $value) {

            $result[ $value['c_key'] ] = $symbol . '[子类]-->' . $value['name'];

            $childData = static::recursionClsSelect( $value, $type, ($num + 1) );

            if (empty( $childData ))
                continue;

            $result = array_merge( $result, $childData );
        }

        return $result;
    }

}
