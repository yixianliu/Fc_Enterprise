<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Url;

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

    static public $parent_id = 'M0';

    static public $frontend_parent_id = 'E1';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Menu}}';
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
            [['m_key', 'name', 'is_using', 'parent_id', 'model_key', 'rp_key'], 'required'],
            [['is_using', 'rp_key'], 'string'],
            [['m_key', 'parent_id'], 'string', 'max' => 55],
            [['rp_key', 'model_key', 'name'], 'string', 'max' => 85],
            [['m_key'], 'unique'],

            // 默认
            [['custom_key', 'url', 'rp_key', 'is_type'], 'default', 'value' => null],
            [['sort_id',], 'default', 'value' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'm_key'      => '菜单关键KEY',
            'is_type'    => '菜单类型',
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
     * 列表
     *
     * @param null $parent
     * @param null $type
     * @param string $relevance
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function findByAll($parent = null, $type = null, $relevance = 'Off')
    {

        $parent = empty($parent) ? 'E1' : $parent;

        if ($relevance == 'On')
            return static::find()->where(['is_using' => 'On', 'parent_id' => $parent])->asArray()->all();

        return static::find()->where([self::tableName() . '.is_using' => 'On', self::tableName() . '.parent_id' => $parent])
            ->andWhere([self::tableName() . '.is_language' => $type])
            ->orderBy('sort_id', 'ASC')
            ->joinWith('role')
            ->joinWith('menuModel')
            ->joinWith('pages')
            ->asArray()
            ->all();
    }

    /**
     * 查找指定菜单
     *
     * @param $id
     * @param string $relevance
     * @return array|bool|Menu|null|\yii\db\ActiveRecord
     */
    public static function findByOne($id, $relevance = 'Off')
    {
        if (empty($id))
            return false;

        if ($relevance == 'On')
            return static::find()->where(['is_using' => 'On', 'm_key' => $id])->asArray()->one();

        return static::find()->where([self::tableName() . '.m_key' => $id])
            ->joinWith('role')
            ->joinWith('menuModel')
            ->joinWith('pages')
            ->asArray()
            ->one();
    }

    // 菜单模型
    public function getMenuModel()
    {
        return $this->hasOne(MenuModel::className(), ['model_key' => 'model_key']);
    }

    // 角色
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['name' => 'rp_key']);
    }

    // 角色
    public function getPages()
    {
        return $this->hasOne(Pages::className(), ['m_key' => 'm_key']);
    }

    /**
     * 获取菜单数据 (Yii 版本)
     *
     * @param $pid
     * @param null $type
     * @return array|void
     */
    public function findMenuNav($pid, $type = null)
    {
        // 初始化
        $dataMenu = array();

        $data = static::findByAll($pid, $type);

        if (empty($data))
            return;

        foreach ($data as $value) {

            $array = array();

            switch ($value['menuModel']['url_key']) {

                // 招聘
                case 'job':
                    $array = $this->recursionJobMenu($value, $type);
                    break;

                // 产品分类模型
                case 'product':

                    $product = ProductClassify::findByAll(ProductClassify::$parent_cly_id);

                    foreach ($product as $values) {
                        $array[] = [
                            'label'   => $values['name'],
                            'url'     => ['/product/index', 'id' => $values['c_key']],
                            'items'   => static::recursionProductMenu($values, $type),
                            'options' => ['class' => 'sub-menu'],
                        ];
                    }
                    break;

                // 采购模型
                case 'purchase':
                    $array = $this->recursionPurchaseMenu($value, $type);
                    break;

                // 供应模型
                case 'supply':

                    $product = PsbClassify::findAll(['is_using' => 'On', 'is_type' => 'Supply']);

                    foreach ($product as $values) {
                        $array[] = [
                            'label' => $values['name'],
                            'url'   => ['/supply/index', 'id' => $values['c_key']],
                            'items' => static::recursionMenu($values, $type),
                        ];
                    }
                    break;

                // 投标模型
                case 'bid':

                    $product = PsbClassify::findAll(['is_using' => 'On', 'parent_id' => 'C0']);

                    foreach ($product as $values) {
                        $array[] = [
                            'label' => $values['name'],
                            'url'   => ['/bid/index', 'id' => $values['c_key']],
                            'items' => static::recursionMenu($values),
                        ];
                    }
                    break;

                // 新闻模型
                case 'news':

                    $news = NewsClassify::findByAll('C0');

                    foreach ($news as $values) {
                        $array[] = [
                            'label' => $values['name'],
                            'url'   => ['/news/index', 'id' => $values['c_key']],
                            'items' => static::recursionNewsMenu($values),
                        ];
                    }
                    break;

                // 自定义
                case 'pages':
                    $array = $this->recursionPagesMenu($value, $type);
                    break;

                // 超链接
                case 'urls':
                    $array = $this->recursionUrlMenu($value, $value['parent_id'], $type);
                    break;
            }

            // 菜单超链接
            switch ($value['menuModel']['url_key']) {

                // 单页面
                case 'pages':
                    $urls = !empty($value['url']) ? $value['url'] : null;
                    break;

                case 'urls':
                    $urls = $value['url'];
                    break;

                default:
                    $urls = $value['menuModel']['url_key'] . '/' . $value['is_type'];
                    break;

            }

            $dataMenu[] = [
                'label' => $value['name'],
                'url'   => [$urls],
                'items' => $array,
            ];

        }

        return $dataMenu;
    }

    /**
     * 产品分类
     *
     * @param $data
     * @param null $type
     * @return array|void
     */
    public static function recursionProductMenu($data, $type = null)
    {

        if (empty($data) || empty($data['c_key']))
            return;

        $child = ProductClassify::findByAll($data['c_key']);

        if (empty($child))
            return;

        // 初始化
        $result = array();

        foreach ($child as $value) {
            $result[] = [
                'label' => $value['name'],
                'url'   => ['product/index', 'id' => $value['c_key']],
                'items' => static::recursionProductMenu($value, $type),
            ];
        }

        return $result;
    }

    /**
     * 新闻分类
     *
     * @param $data
     * @param null $type
     * @return array|void
     */
    public static function recursionNewsMenu($data, $type = null)
    {

        if (empty($data) || empty($data['c_key']))
            return;

        $child = NewsClassify::findByAll($data['c_key']);

        if (empty($child))
            return;

        // 初始化
        $result = array();

        foreach ($child as $value) {
            $result[] = [
                'label' => $value['name'],
                'url'   => ['news/index', 'id' => $value['c_key']],
                'items' => static::recursionNewsMenu($value, $type),
            ];
        }

        return $result;
    }

    /**
     * 采购平台
     *
     * @param $data
     * @param null $type
     * @return array|void
     */
    public function recursionPurchaseMenu($data, $type = null)
    {
        if (empty($data) || empty($data['m_key']))
            return;

        $child = static::findByAll($data['m_key'], $type);

        if (empty($child))
            return;

        // 初始化
        $result = array();

        foreach ($child as $value) {
            $result[] = [
                'label' => $value['name'],
                'url'   => static::setMenuModel($value),
                'items' => static::recursionPurchaseMenu($value, $type),
            ];
        }

        return $result;
    }

    /**
     * 采购平台
     *
     * @param $data
     * @param null $type
     * @return array|void
     */
    public function recursionJobMenu($data, $type = null)
    {
        if (empty($data) || empty($data['m_key']))
            return;

        $child = static::findByAll($data['m_key'], $type);

        if (empty($child))
            return;

        // 初始化
        $result = array();

        foreach ($child as $value) {
            $result[] = [
                'label' => $value['name'],
                'url'   => static::setMenuModel($value),
                'items' => static::recursionPurchaseMenu($value, $type),
            ];
        }

        return $result;
    }

    /**
     * 递归菜单 (固定控制器使用)
     *
     * @param $data
     * @param $type
     * @return array|void
     */
    static public function recursionMenu($data, $type = null)
    {

        if (empty($data) || empty($data['m_key']))
            return;

        $child = static::findByAll($data['m_key'], $type);

        if (empty($child))
            return;

        // 初始化
        $result = array();

        foreach ($child as $value) {
            $result[] = [
                'label' => $value['name'],
                'url'   => [$value['menuModel']['url_key']],
                'items' => static::recursionMenu($value, $type),
            ];
        }

        return $result;
    }

    /**
     * 递归菜单 (单页面使用)
     *
     * @param $data
     * @param null $type
     * @return array|void
     */
    static public function recursionPagesMenu($data, $type = null)
    {

        if (empty($data))
            return;

        // 子分类
        $childCls = static::findByAll($data['m_key'], $type);

        if (empty($childCls))
            return;

        // 初始化
        $result = array();

        foreach ($childCls as $value) {

            $result[] = [
                'label' => $value['name'],
                'url'   => static::setMenuModel($value),
                'items' => static::recursionPagesMenu($value, $type),
            ];
        }

        return $result;
    }

    /**
     * 递归 Url 菜单
     *
     * @param $data
     * @param null $adminid
     * @param null $type
     * @return array|void
     */
    static public function recursionUrlMenu($data, $adminid = null, $type = null)
    {

        if (empty($data) || empty($data['m_key'])) {
            return;
        }

        $child = static::findByAll($data['m_key'], $type);

        if (empty($child))
            return;

        // 初始化
        $result = array();

        foreach ($child as $value) {
            $result[] = [
                'label' => $value['name'],
                'url'   => static::setMenuModel($value, $adminid),
                'items' => static::recursionUrlMenu($value, $adminid, $type),
            ];
        }

        return $result;
    }

    /**
     * 根据菜单模型来订制链接
     *
     * @param $data
     * @param null $adminid
     * @return array|null|string
     */
    static public function setMenuModel($data, $adminid = null)
    {

        // 初始化
        $urls = null;

        if (empty($data['menuModel']['url_key']))
            return;

        switch ($data['menuModel']['url_key']) {

            // 采购页面
            case 'purchase':
//                $urls = [$data['url']];
                $urls = ['/purchase/' . $data['is_type']];
                break;

            // 自定义页面
            case 'pages':

                $urls = empty($data['url']) ? ['/pages/' . $data['is_type'], 'id' => $data['pages']['page_id']] : $data['url'];

                break;

            // 招聘
            case 'job':
                $urls = ['/job/' . $data['is_type']];
                break;

            // 超链接
            case 'urls':

                if (!empty($data['url'])) {

                    if (strpos($data['url'], 'http') !== false) {
                        return $data['url'];
                    }

                    $urls = [$adminid == 'A3' ? 'admin/' . $data['url'] : $data['url']];

                } else {
                    $urls = [$data['url']];
                }

                break;
        }

        return $urls;
    }

    /**
     * 菜单 (选项框使用)
     *
     * @param null $parent_id
     * @return array
     */
    public static function getSelectMenu($parent_id = null)
    {

        $parent_id = empty($parent_id) ? static::$parent_id : $parent_id;

        // 产品分类
        $dataClassify = static::findByAll($parent_id, Yii::$app->session['language']);

        // 初始化
        $result = array();

        $result['E1'] = '一级菜单';

        foreach ($dataClassify as $key => $value) {

            $result[ $value['m_key'] ] = $value['name'];

            $child = static::recursionMenuSelect($value);

            if (empty($child))
                continue;

            $result = array_merge($result, $child);
        }

        return $result;
    }

    /**
     * 菜单选择(针对选项框)
     *
     * @param $data
     * @param int $num
     * @return array|void
     */
    public static function recursionMenuSelect($data, $num = 1)
    {

        if (empty($data))
            return;

        // 初始化
        $result = array();
        $symbol = null;

        $child = static::findByAll($data['m_key'], Yii::$app->session['language']);

        if (empty($child))
            return;

        if ($num != 0) {
            for ($i = 0; $i <= $num; $i++) {
                $symbol .= '――――';
            }
        }

        foreach ($child as $key => $value) {

            $result[ $value['m_key'] ] = $symbol . $value['name'];

            $childData = static::recursionMenuSelect($value, ($num + 1));

            if (empty($childData))
                continue;

            $result = array_merge($result, $childData);

        }

        return $result;
    }
}
