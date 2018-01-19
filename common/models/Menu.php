<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property integer $id
 * @property string $m_key
 * @property string $sort_id
 * @property string $parent_id
 * @property string $rp_key
 * @property string $model_key
 * @property string $name
 * @property string $is_using
 * @property string $created_at
 * @property string $updated_at
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
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
            [['m_key', 'sort_id', 'name', 'is_using', 'model_key'], 'required'],
            [['sort_id',], 'integer'],
            [['is_using'], 'string'],
            [['m_key', 'parent_id'], 'string', 'max' => 55],
            [['rp_key', 'model_key', 'name'], 'string', 'max' => 85],
            [['m_key'], 'unique'],

            // 默认
            [['custom_key', 'url', 'rp_key'], 'default', 'value' => null],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'm_key'      => '菜单关键KEY',
            'sort_id'    => '菜单排序',
            'parent_id'  => '父类菜单',
            'rp_key'     => '角色关键KEY',
            'model_key'  => '菜单模型',
            'name'       => '菜单名称',
            'url'        => '菜单外部链接',
            'is_using'   => '是否启用',
            'custom_key' => '自定义页面分类KEY',
            'created_at' => '添加数据时间',
            'updated_at' => '更新数据时间',
        ];
    }

    /**
     * 所有
     *
     * @param $parent
     * @return bool
     */
    public static function findByAll($parent)
    {

        if (empty($parent))
            return false;

        return static::find()->where([self::tableName() . '.is_using' => 'On', self::tableName() . '.parent_id' => $parent])
            ->orderBy('sort_id', 'ASC')
            ->joinWith('itemRp')
            ->joinWith('menuModel')
            ->asArray()
            ->all();
    }

    /**
     *
     * 查找指定菜单
     *
     * @param $id
     */
    public static function findByOne($id)
    {
        if (empty($id)) {
            return false;
        }

        return static::find()->where(['m_key' => $id])
            ->joinWith('itemRp')
            ->asArray()
            ->one();
    }

    // 菜单模型
    public function getMenuModel()
    {
        return $this->hasOne(MenuModel::className(), ['model_key' => 'model_key']);
    }

    // 角色
    public function getItemRp()
    {
        return $this->hasOne(ItemRp::className(), ['name' => 'rp_key']);
    }

    /**
     * 获取菜单数据 (Yii 版本)
     *
     * @param $pid
     * @return array
     */
    public function findMenuNav($pid)
    {
        // 初始化
        $dataMenu = array();
        $array = array();

        $data = static::findByAll($pid);

        foreach ($data as $value) {

            switch ($value['menuModel']['url_key']) {

                // 产品模型
                case 'product':

                    $product = ProductClassify::findAll(['is_using' => 'On', 'parent_id' => 'C0']);

                    foreach ($product as $values) {
                        $array[] = [
                            'label' => $values['name'],
                            'url'   => ['/product-cls/index', 'id' => $values['c_key']],
                            'items' => $this->recursionMenu($values),
                        ];
                    }
                    break;

                // 采购模型
                case 'purchase':

                    $purchase = PsbClassify::findAll(['is_using' => 'On', 'is_type' => 'Purchase']);

                    foreach ($purchase as $values) {
                        $array[] = [
                            'label' => $values['name'],
                            'url'   => ['/purchase/index', 'id' => $values['c_key']],
                            'items' => $this->recursionMenu($values),
                        ];
                    }
                    break;

                // 供应模型
                case 'supply':

                    $product = PsbClassify::findAll(['is_using' => 'On', 'is_type' => 'Supply']);

                    foreach ($product as $values) {
                        $array[] = [
                            'label' => $values['name'],
                            'url'   => ['/supply/index', 'id' => $values['c_key']],
                            'items' => $this->recursionMenu($values),
                        ];
                    }
                    break;

                // 投标模型
                case 'bid':

                    $product = ProductClassify::findAll(['is_using' => 'On', 'parent_id' => 'C0']);

                    foreach ($product as $values) {
                        $array[] = [
                            'label' => $values['name'],
                            'url'   => ['/bid/index', 'id' => $values['c_key']],
                            'items' => $this->recursionMenu($values),
                        ];
                    }
                    break;

                // 新闻模型
                case 'news':

                    $news = NewsClassify::findAll(['is_using' => 'On', 'parent_id' => 'C0']);

                    foreach ($news as $values) {
                        $array[] = [
                            'label' => $values['name'],
                            'url'   => ['/news-cls/index', 'id' => $values['c_key']],
                            'items' => $this->recursionMenu($values),
                        ];
                    }
                    break;

                // 自定义
                case 'pages':

                    // 自定义页面的KEY
                    $custom = Pages::findAll(['is_using' => 'On', 'c_key' => $value['custom_key']]);

                    foreach ($custom as $values) {
                        $array[] = [
                            'label' => $values['name'],
                            'url'   => ['/pages/' . $this->getPageType($values['is_type']), 'id' => $values['page_id']],
                            'items' => $this->recursionPagesMenu($values),
                        ];
                    }
                    break;

                // 超链接
                case 'urls':
                    $array = $this->recursionUrlMenu($value, $value['parent_id']);
                    break;

                // 默认
                default:
                    $array = $this->recursionMenu($value);
                    break;
            }

            $customId = empty($value['custom_key']) ? 1 : $value['custom_key'];

            // 自定义外部链接
            $urls = ($value['menuModel']['url_key'] == 'urls' ? '#' : [$value['menuModel']['url_key'] . '/index', 'id' => $customId]);

            $dataMenu[] = [
                'label' => $value['name'],
                'url'   => $urls,
                'items' => $array,
            ];

            $array = array();

        }

        return $dataMenu;
    }

    /**
     * 递归菜单
     *
     * @param $data
     * @return array|void
     */
    public function recursionMenu($data)
    {

        if (empty($data) || empty($data['m_key'])) {
            return;
        }

        $child = Menu::findByAll($data['m_key']);

        if (empty($child)) {
            return;
        }

        // 初始化
        $result = array();

        foreach ($child as $value) {
            $result[] = [
                'label' => $value['name'],
                'url'   => [$value['menuModel']['url_key']],
                'items' => $this->recursionMenu($value),
            ];
        }

        return $result;
    }

    /**
     * 单页面递归菜单
     *
     * @param $data
     * @return array|void
     */
    public function recursionPagesMenu($data)
    {

        if (empty($data) || !empty($data['c_key'])) {
            return;
        }

        // 子分类
        $childCls = PagesClassify::findAll(['is_using' => 'On', 'parent_id' => $data['c_key']]);

        if (empty($childCls))
            return;

        $child = Pages::findAll(['is_using' => 'On', 'c_key' => $childCls['c_key']]);

        if (empty($child)) {
            return;
        }

        // 初始化
        $result = array();

        foreach ($child as $value) {
            $result[] = [
                'label' => $value['name'],
                'url'   => ['/pages/' . $this->getPageType($value['is_type']), 'id' => $value['page_id']],
                'items' => $this->recursionPagesMenu($value),
            ];
        }

        return $result;
    }

    /**
     * 获取单页面类型
     *
     * @param $type
     * @return string
     */
    public function getPageType($type)
    {
        // 判断类型
        switch ($type) {

            // 列表
            default:
            case 'list':
                $type = 'list';
                break;

            // 内容
            case 'content':
                $type = 'view';
                break;
        }

        return $type;
    }

    /**
     * 递归 Url 菜单
     *
     * @param $data
     * @param null $adminid
     * @return array|void
     */
    public function recursionUrlMenu($data, $adminid = null)
    {

        if (empty($data) || empty($data['m_key'])) {
            return;
        }

        $child = Menu::findByAll($data['m_key']);

        if (empty($child))
            return;

        // 初始化
        $result = array();

        foreach ($child as $value) {

            if (!empty($value['url'])) {
                $url = ($adminid == 'A3' ? 'admin/' . $value['url'] : $value['url']);
            } else {
                $url = '#';
            }

            $result[] = [
                'label' => $value['name'],
                'url'   => [$url],
                'items' => $this->recursionUrlMenu($value, $adminid),
            ];
        }

        return $result;
    }
}
