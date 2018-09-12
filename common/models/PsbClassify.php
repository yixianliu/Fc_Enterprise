<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

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
class PsbClassify extends \yii\db\ActiveRecord
{

    static public $parent_cly_id = [
        'Supply'   => 'S0',
        'Purchase' => 'P0',
        'Bid'      => 'B0',
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
            [['c_key', 'parent_id'], 'string', 'max' => 55],
            [['name'], 'string', 'max' => 85],
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
            'parent_id'   => '父类分类',
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
     * @return array|PsbClassify[]|\yii\db\ActiveRecord[]
     */
    static public function findByAll($parent_id = null, $type = 'Supply')
    {

        $parent_id = empty($parent_id) ? static::$parent_cly_id[ $type ] : $parent_id;

        return static::find()->where(['parent_id' => $parent_id, 'is_type' => $type])
            ->orderBy('sort_id', SORT_DESC)
            ->asArray()
            ->all();
    }

    /**
     * 获取分类 (选项卡)
     *
     * @param null   $parent_id
     * @param string $type
     * @param string $one
     *
     * @return array
     */
    public static function getClsSelect($type = 'Supply', $one = 'On', $parent_id = null)
    {

        $parent_id = empty($parent_id) ? static::$parent_cly_id[ $type ] : $parent_id;

        // 初始化
        $result = [];

        // 所有分类
        $dataClassify = static::findByAll($parent_id, $type);

        if ($one == 'On')
            $result[ static::$parent_cly_id[ $type ] ] = '顶级分类 !!';

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
     * 无限分类(选项框)
     *
     * @param     $data
     * @param int $num
     */
    public static function recursionClsSelect($data, $num = 1)
    {

        if (empty($data))
            return;

        // 初始化
        $result = [];
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

            $childData = static::recursionClsSelect($value, ( $num + 1 ));

            if (empty($childData))
                continue;

            $result = array_merge($result, $childData);
        }

        return $result;
    }


    /**
     * 群发 sms 信息
     *
     * @param        $data
     * @param string $type
     *
     * @return bool
     */
    public static function smsSend($data, $type = 'purchase')
    {

        // 初始化
        $mobile = null;

        if (empty($data['Purchase']['is_send_msg']) || $data['Purchase']['is_send_msg'] != 'On') {
            return false;
        }

        $user = User::findAll(['is_type' => 'purchase']);

        if (empty($user)) {
            return false;
        }

        $content = '【湛江沃噻网络】我司发布了一条新的采购信息 : "' . $data['title'] . '"。如果符合你公司的供应货品,请致电联系我司客服进行沟通.';

        // 接收的手机号,多个手机号用英文逗号隔开
        foreach ($user as $value) {
            $mobile .= $value . ',';
        }

        if (!Yii::$app->smser->send($mobile, $content))
            return false;

        return true;
    }
}
