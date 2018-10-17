<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property integer $id
 * @property string  $m_key
 * @property string  $sort_id
 * @property string  $parent_id
 * @property string  $rp_key
 * @property string  $model_key
 * @property string  $name
 * @property string  $is_using
 * @property string  $created_at
 * @property string  $updated_at
 */
class Menu extends \yii\db\ActiveRecord
{

    static public $parent_id = 'M0';

    static public $frontend_parent_id = 'E1';

    static public $frontend_language = 'cn';

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
            [['m_key', 'name', 'parent_id', 'model_key'], 'required'],
            [['is_using', 'rp_key'], 'string'],
            [['sort_id',], 'integer'],
            [['m_key', 'parent_id'], 'string', 'max' => 55],
            [['rp_key', 'model_key', 'name'], 'string', 'max' => 85],
            [['m_key'], 'unique'],

            // 默认
            [['custom_key', 'url', 'rp_key', 'is_type',], 'default', 'value' => null],
            [['is_using',], 'default', 'value' => 'On'],
            [['rp_key',], 'default', 'value' => 'guest'],
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
     * @param null   $parent
     * @param null   $language
     * @param string $relevance
     * @param string $is_using
     *
     * @return array|Menu[]|NewsClassify[]|\yii\db\ActiveRecord[]
     */
    public static function findByAll($parent = null, $language = null, $relevance = 'Off', $is_using = 'On')
    {

        $language = empty( $type ) ? Language::$default_key : $language;

        $parent = empty( $parent ) ? static::$frontend_parent_id : $parent;

        if ($relevance == 'On')
            return static::find()->where( ['is_using' => $is_using, 'parent_id' => $parent] )->asArray()->all();

        return static::find()->where( [self::tableName() . '.is_using' => $is_using, self::tableName() . '.parent_id' => $parent] )
            ->andWhere( [self::tableName() . '.is_language' => $language] )
            ->orderBy( 'sort_id', 'ASC' )
            ->joinWith( 'role' )
            ->joinWith( 'menuModel' )
            ->joinWith( 'pages' )
            ->joinWith( 'language' )
            ->asArray()
            ->all();
    }

    /**
     * 查找指定菜单
     *
     * @param        $id
     * @param string $relevance
     *
     * @return array|bool|Menu|null|\yii\db\ActiveRecord
     */
    public static function findByOne($id, $relevance = 'Off')
    {
        if (empty( $id ))
            return false;

        if ($relevance == 'On')
            return static::find()->where( ['is_using' => 'On', 'm_key' => $id] )->asArray()->one();

        return static::find()->where( [self::tableName() . '.m_key' => $id] )
            ->joinWith( 'role' )
            ->joinWith( 'menuModel' )
            ->joinWith( 'pages' )
            ->asArray()
            ->one();
    }

    // 菜单模型
    public function getMenuModel()
    {
        return $this->hasOne( MenuModel::className(), ['model_key' => 'model_key'] );
    }

    // 角色
    public function getRole()
    {
        return $this->hasOne( Role::className(), ['name' => 'rp_key'] );
    }

    // 角色
    public function getPages()
    {
        return $this->hasOne( Pages::className(), ['m_key' => 'm_key'] );
    }

    // 角色
    public function getLanguage()
    {
        return $this->hasOne( Language::className(), ['lang_key' => 'is_language'] );
    }

    /**
     * 获取菜单数据 (Yii 版本)
     *
     * @param      $pid
     * @param null $type
     *
     * @return array|void
     */
    public static function findMenuNav($pid, $type = null)
    {
        // 初始化
        $dataMenu = [];

        $data = static::findByAll( $pid, $type );

        if (empty( $data ))
            return;

        foreach ($data as $value) {

            $array = $value;

            switch ($value['menuModel']['url_key']) {

                // 下载中心
                case 'download':

                    if (Yii::$app->controller->id == 'job')
                        $array['open'] = 'On';

                    $array['url'] = ['/download/index'];
                    $array['child'] = static::recursionJobMenu( $value, $type );
                    break;

                // 招聘
                case 'job':

                    if (Yii::$app->controller->id == 'job')
                        $array['open'] = 'On';

                    $array['url'] = ['/job/index'];
                    $array['child'] = static::recursionJobMenu( $value, $type );
                    break;

                // 产品分类模型
                case 'product':

                    if (Yii::$app->controller->id == 'product')
                        $array['open'] = 'On';

                    $array['child'] = static::recursionProductMenu( null, ProductClassify::$parent_cly_id, $type );
                    break;

                // 采购模型
                case 'purchase':
                    $array['child'] = static::recursionPurchaseMenu( $value, $type );
                    break;

                // 供应模型
                case 'supply':

                    $product = PsbClassify::findAll( ['is_using' => 'On', 'is_type' => 'Supply'] );

                    foreach ($product as $key => $values) {
                        $array['child'][ $key ]['url'] = ['/supply/index', 'id' => $values['c_key']];
                        $array['child'][ $key ]['child'] = static::recursionMenu( $values, $type );
                    }
                    break;

                // 投标模型
                case 'bid':

                    $product = PsbClassify::findAll( ['is_using' => 'On', 'parent_id' => 'C0'] );

                    foreach ($product as $key => $values) {
                        $array['child'][ $key ]['url'] = ['/bid/index', 'id' => $values['c_key']];
                        $array['child'][ $key ]['child'] = static::recursionMenu( $values, $type );
                    }
                    break;

                // 新闻模型
                case 'news':

                    if (Yii::$app->controller->id == 'news')
                        $array['open'] = 'On';

                    $array['child'] = static::recursionNewsMenu( null, NewsClassify::$parent_cly_id, $type );
                    break;

                // 自定义
                case 'pages':

                    $id = Yii::$app->request->get( 'id', null );

                    $array['url'] = static::setMenuModel( $value );

                    if (!empty( $array['url']['id'] ) && $array['url']['id'] == $id)
                        $array['open'] = 'On';

                    $array['child'] = static::recursionPagesMenu( $value, $type );
                    break;

                // 超链接
                case 'urls':

                    $urlActive = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;

                    if (!empty( $array['url'] ) && $array['url'] == $urlActive)
                        $array['open'] = 'On';

                    $array['child'] = static::recursionUrlMenu( $value, $value['parent_id'], $type );
                    break;
            }

            $dataMenu[] = $array;
        }

        return $dataMenu;
    }

    /**
     * 递归产品分类
     *
     * @param      $data
     * @param null $pid
     * @param null $type
     *
     * @return array|void|\yii\db\ActiveRecord[]
     */
    public static function recursionProductMenu($data = null, $pid = null, $type = null)
    {

        if (empty( $pid )) {

            if (empty( $data ) || empty( $data['c_key'] ))
                return;

            $pid = $data['c_key'];
        }

        $child = ProductClassify::findByAll( $pid );

        if (empty( $child ))
            return;

        foreach ($child as $key => $value) {
            $child[ $key ]['url'] = ['product/index', 'id' => $value['c_key']];
            $child[ $key ]['child'] = static::recursionProductMenu( $value, null, $type );
        }

        return $child;
    }

    /**
     * 新闻分类
     *
     * @param      $data
     * @param null $type
     *
     * @return array|void
     */
    public static function recursionNewsMenu($data = null, $pid = null, $type = null)
    {

        if (empty( $pid )) {

            if (empty( $data ) || empty( $data['c_key'] ))
                return;

            $pid = $data['c_key'];
        }

        $child = NewsClassify::findByAll( $pid );

        if (empty( $child ))
            return;

        foreach ($child as $key => $value) {
            $child[ $key ]['url'] = ['news/index', 'id' => $value['c_key']];
            $child[ $key ]['child'] = static::recursionNewsMenu( $value, null, $type );
        }

        return $child;
    }

    /**
     * 递归采购
     *
     * @param      $data
     * @param null $type
     *
     * @return array|void
     */
    public static function recursionPurchaseMenu($data, $type = null)
    {
        if (empty( $data ) || empty( $data['m_key'] ))
            return;

        $child = static::findByAll( $data['m_key'], $type );

        if (empty( $child ))
            return;

        foreach ($child as $key => $value) {
            $child[ $key ]['url'] = static::setMenuModel( $value );
            $child[ $key ]['child'] = static::recursionPurchaseMenu( $value, $type );
        }

        return $child;
    }

    /**
     * 递归招聘
     *
     * @param      $data
     * @param null $type
     *
     * @return array|void
     */
    public static function recursionJobMenu($data, $type = null)
    {

        if (empty( $data ) || empty( $data['m_key'] ))
            return;

        $child = static::findByAll( $data['m_key'], $type );

        if (empty( $child ))
            return;

        foreach ($child as $key => $value) {
            $child[ $key ]['url'] = static::setMenuModel( $value );
            $child[ $key ]['child'] = static::recursionJobMenu( $value, $type );
        }

        return $child;
    }

    /**
     * 递归菜单 (固定控制器使用)
     *
     * @param $data
     * @param $type
     *
     * @return array|void
     */
    static public function recursionMenu($data, $type = null)
    {

        if (empty( $data ) || empty( $data['m_key'] ))
            return;

        $child = static::findByAll( $data['m_key'], $type );

        if (empty( $child ))
            return;

        foreach ($child as $key => $value) {
            $child[ $key ]['url'] = [$value['menuModel']['url_key']];
            $child[ $key ]['child'] = static::recursionMenu( $value, $type );
        }

        return $child;
    }

    /**
     * 递归菜单 (单页面使用)
     *
     * @param      $data
     * @param null $type
     *
     * @return array|void
     */
    static public function recursionPagesMenu($data, $type = null)
    {

        if (empty( $data ))
            return;

        $urlActive = '/' . Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;

        // 子分类
        $child = static::findByAll( $data['m_key'], $type );

        if (empty( $child ))
            return;

        $id = Yii::$app->request->get( 'id', null );

        foreach ($child as $key => $value) {

            $child[ $key ]['url'] = static::setMenuModel( $value );

            if (!empty( $child[ $key ]['url'][0] ) && $urlActive == $child[ $key ]['url'][0] && !empty( $child[ $key ]['url']['id'] ) && $child[ $key ]['url']['id'] == $id)
                $child[ $key ]['active'] = 'On';

            $child[ $key ]['child'] = static::recursionPagesMenu( $value, $type );
        }

        return $child;
    }

    /**
     * 递归 Url 菜单
     *
     * @param      $data
     * @param null $adminid
     * @param null $type
     *
     * @return array|void
     */
    static public function recursionUrlMenu($data, $adminid = null, $type = null)
    {

        if (empty( $data ) || empty( $data['m_key'] )) {
            return;
        }

        $urlActive = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;

        $child = static::findByAll( $data['m_key'], $type );

        if (empty( $child ))
            return;

        foreach ($child as $key => $value) {

            $child[ $key ]['url'] = static::setMenuModel( $value, $adminid );

            // 针对后台
            if ($child[ $key ]['url'] == $urlActive)
                $child[ $key ]['active'] = 'On';

            $child[ $key ]['child'] = static::recursionUrlMenu( $value, $adminid, $type );
        }

        return $child;
    }

    /**
     * 根据菜单模型来订制链接
     *
     * @param      $data
     * @param null $adminid
     *
     * @return array|null|string
     */
    static public function setMenuModel($data, $adminid = null)
    {

        // 初始化
        $urls = null;

        if (empty( $data['menuModel']['url_key'] ))
            return;

        switch ($data['menuModel']['url_key']) {

            // 采购页面
            case 'purchase':
                $urls = ['/purchase/' . $data['is_type']];
                break;

            // 自定义页面
            case 'pages':

                // 输出调整路径
                if (strpos( $data['url'], ',' ) !== false) {
                    $urlData = explode( ',', $data['url'] );
                    $urls = [$urlData[0], 'id' => $urlData[1]];
                    break;
                }

                $urls = empty( $data['url'] ) ? ['/pages/' . $data['is_type'], 'mid' => $data['pages']['page_id']] : [$data['url']];

                break;

            // 在线留言
            case 'comment':
                $urls = ['/comment/index'];
                break;

            // 在线地图
            case 'map':
                $urls = ['/map/index'];
                break;

            // 招聘
            case 'job':
                $urls = ['/job/' . $data['is_type']];
                break;

            // 超链接
            case 'urls':

                if (!empty( $data['url'] )) {

                    if (strpos( $data['url'], 'http' ) !== false) {
                        return $data['url'];
                    }

                    $urls = $adminid == 'A3' ? 'admin/' . $data['url'] : $data['url'];

                } else {
                    $urls = $data['url'];
                }

                break;
        }

        return $urls;
    }

    /**
     * 菜单 (选项框使用)
     *
     * @param null $parent_id
     *
     * @return array
     */
    public static function getSelectMenu($parent_id = null)
    {

        $parent_id = empty( $parent_id ) ? static::$parent_id : $parent_id;

        // 产品分类
        $dataClassify = static::findByAll( $parent_id, Yii::$app->session['language'] );

        // 初始化
        $result = [];

        $result['E1'] = '一级菜单';

        foreach ($dataClassify as $key => $value) {

            $result[ $value['m_key'] ] = $value['name'];

            $child = static::recursionMenuSelect( $value );

            if (empty( $child ))
                continue;

            $result = array_merge( $result, $child );
        }

        return $result;
    }

    /**
     * 菜单选择(针对选项框)
     *
     * @param     $data
     * @param int $num
     *
     * @return array|void
     */
    public static function recursionMenuSelect($data, $num = 1)
    {

        if (empty( $data ))
            return;

        // 初始化
        $result = [];
        $symbol = null;

        $child = static::findByAll( $data['m_key'], Yii::$app->session['language'] );

        if (empty( $child ))
            return;

        if ($num != 0) {
            for ($i = 0; $i <= $num; $i++) {
                $symbol .= '――――';
            }
        }

        foreach ($child as $key => $value) {

            $result[ $value['m_key'] ] = $symbol . $value['name'];

            $childData = static::recursionMenuSelect( $value, ($num + 1) );

            if (empty( $childData ))
                continue;

            $result = array_merge( $result, $childData );

        }

        return $result;
    }

    /**
     * 底部目录,HTML版本(最多支持二级目录)
     *
     * @param null   $parent
     * @param string $child
     * @param int    $num
     * @param null   $language
     * @param null   $type
     *
     * @return bool|string
     */
    public static function getFootMenuHtml($parent = null, $child = 'On', $num = 1, $language = null, $type = null)
    {

        // 菜单
        if ($type == null || $num == 1) {

            $menu = static::findByAll( $parent, (empty( $language ) ? static::$frontend_language : $language) );

            if (empty( $menu )) {
                return false;
            }

            $html = '<ul>';

            // 循环菜单
            foreach ($menu as $value) {

                $html .= ' <li>';

                if ($value['menuModel']['url_key'] == 'pages') {
                    $html .= Html::a( $value['name'], ['pages/' . $value['is_type'], 'id' => $value['pages']['page_id']], ['title' => $value['name']] );
                }// 超链接
                else if ($value['menuModel']['url_key'] == 'urls') {
                    $html .= Html::a( $value['name'], [$value['url']], ['title' => $value['name']] );
                } // 基本
                else {
                    $html .= Html::a( $value['name'], [$value['menuModel']['url_key'] . '/' . $value['is_type']], ['title' => $value['name']] );
                }

                // 二级
                if ($child == 'On' && $num <= 2) {

                    // 忽略
                    if ($value['menuModel']['url_key'] == 'pages' || $value['menuModel']['url_key'] == 'urls') {
                        $value['menuModel']['url_key'] = null;
                    }

                    $html .= static::getFootMenuHtml( $value['m_key'], 'On', ($num + 1), $language, $value['menuModel']['url_key'] );
                }

                $html .= '</li>';

            }

            $html .= '</ul>';

        }// 内容分类
        else {

            if ($child != 'On') {
                return false;
            }

            $menu = static::findByOne( $parent );

            $dataCls = null;

            switch ($menu['menuModel']['url_key']) {
                case 'product':
                    $dataCls = ProductClassify::findByAll();
                    break;
                case 'news':
                    $dataCls = NewsClassify::findByAll();
                    break;
                default:
                    return false;
            }

            $html = '<ul>';

            foreach ($dataCls as $values) {
                $html .= ' <li>';
                $html .= Html::a( $values['name'], [$menu['menuModel']['url_key'] . '/index', 'id' => $menu['m_key']], ['title' => $menu['name']] );
                $html .= '</li>';
            }

            $html .= '</ul>';

            return $html;

        }

        return $html;
    }

    /**
     * 左边栏目,HTML版本(最多支持一级目录)
     *
     * @param $menu
     * @param $id
     *
     * @return array|bool
     */
    public static function getLeftMenuHtml($menu)
    {

        if (empty( $menu ) || !is_array( $menu )) {
            return false;
        }

        $html = null;

        $id = Yii::$app->request->get( 'id', null );

        switch ($menu['menuModel']['url_key']) {

            // 新闻
            case 'news':

                $classify = NewsClassify::findByAll();

                foreach ($classify as $key => $value) {

                    $html .= '<a href="' . Url::to( [$menu['menuModel']['url_key'] . '/index', 'id' => $value['c_key'], 'mid' => $menu['m_key']] ) . '" title="' . $value['name'] . '">';

                    if ($value['c_key'] == $id) {
                        $html .= '<div class="cur" title="' . $value['name'] . '">' . $value['name'] . '</div>';
                    } else {
                        $html .= '<div title="' . $value['name'] . '">' . $value['name'] . '</div>';
                    }

                    $html .= '</a>';

                }

                break;

            // 招聘
            case 'job':

                break;

                // 产品中心


                break;

            // 下载中心
            case 'download':

                $classify = DownloadCls::findByAll();

                foreach ($classify as $key => $value) {
                    $classify[ $key ]['url'] = Url::to( ['/download/index', 'id' => $value['c_key']] );
                }

                break;

            // 公司地图
            case 'map':

                break;

            // 在线留言
            case 'comment':

                break;

            // 单页面
            case 'pages':

                $currentPagesData = (Yii::$app->controller->action->id == 'details') ? Pages::findByOne( Yii::$app->request->get( 'pid', null ) ) : Pages::findByOne( Yii::$app->request->get( 'id', null ) );

                // 父类菜单
                $parentMenuData = Menu::findByOne( $currentPagesData['menu']['parent_id'] );

                // 查找菜单
                $data = Menu::findByOne( $currentPagesData['menu']['m_key'], 'On' );

                if (empty( $data ))
                    break;

                // 为一级目录
                if ($currentPagesData['menu']['parent_id'] == Menu::$frontend_parent_id) {

                    $classify = Menu::findByAll( $currentPagesData['menu']['m_key'], Yii::$app->session['language'] );

                } else {

                    $classify = Menu::findByAll( $currentPagesData['menu']['parent_id'], Yii::$app->session['language'] );

                }

                foreach ($classify as $key => $value) {

                    if (empty( $value['pages']['page_id'] )) {
                        unset( $classify[ $key ] );
                        continue;
                    }

                    $classify[ $key ]['url'] = Url::to( ['/pages/' . $value['is_type'], 'id' => $value['pages']['page_id']] );
                }

                break;

            // 采购
            case 'purchase':

                $classify = PsbClassify::findByAll( 'P0', 'purchase' );

                foreach ($classify as $key => $value) {
                    $classify[ $key ]['url'] = Url::to( ['/purchase/index', 'id' => $value['c_key']] );
                }

                break;

            default:
                return false;
        }

        return $html;
    }

}
