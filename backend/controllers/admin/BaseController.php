<?php
/**
 *
 * 布局控制器
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/6/6
 * Time: 21:46
 */

namespace backend\controllers\admin;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{

    public $layout = 'admin';

    public function init()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect( ['/admin/member/login'] );
        }

        \common\models\Language::isLanguage();

        Yii::$app->view->params['ConfArray'] = \common\models\Conf::findByConfArray( Yii::$app->session['language'], 'On' );

        return true;
    }

    /**
     * 前置函数
     *
     * @param $action
     *
     * @return bool|void|\yii\web\Response
     * @throws \yii\web\UnauthorizedHttpException
     */
    public function beforeAction($action)
    {

        if (!file_exists( Yii::getAlias( '@webroot' ) . '/' . Yii::$app->params['RD_FILE'] )) {
            return $this->redirect( ['/mount/member/login'] );
        }

        if (Yii::$app->user->isGuest) {
            return $this->redirect( ['/admin/member/login'] );
        }

        $power = Yii::$app->controller->action->id . ucfirst( explode( '/', Yii::$app->controller->id )[1] );

        if (!empty( Yii::$app->request->get( 'action' ) )) {
            return true;
        }

        if (!Yii::$app->user->can( $power ) && Yii::$app->getErrorHandler()->exception === null) {
//            throw new \yii\web\UnauthorizedHttpException( '对不起，您现在还没获此操作的权限!' );
        }

        return true;
    }

    /**
     * @return array
     */
    public function actions()
    {
        return [
            'upload' => [
                'class'  => 'kucha\ueditor\UEditorAction',
                'config' => [
                    "imageUrlPrefix"       => Yii::$app->request->hostInfo, // 图片访问路径前缀
                    "imagePathFormat"      => "/../../temp/UEditor/{yyyy}_{mm}_{dd}/{time}_{rand:6}", // 上传保存路径
                    "imageRoot"            => Yii::getAlias( '@webroot/../../frontend/web/' ),
                    "imageManagerListPath" => Yii::getAlias( '@web/../../frontend/web/' ) . 'temp/UEditor',
                ],
            ],
        ];
    }

    /**
     * 随机生成关键KEY
     *
     * @param      $len
     * @param null $chars
     *
     * @return string
     */
    public static function getRandomString($len = 4, $chars = null)
    {

        if (is_null( $chars )) {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        }

        mt_srand( 10000000 * (double)microtime() );

        for ($i = 0, $str = '', $lc = strlen( $chars ) - 1; $i < $len; $i++) {
            $str .= $chars[ mt_rand( 0, $lc ) ];
        }

        $str = $str . '_' . time() . '_' . rand( 0000, 9999 );

        return $str;
    }

    /**
     * 删除图片文件
     *
     * @param      $newFile
     * @param      $oldFile
     * @param null $id
     *
     * @return bool
     */
    public static function ImageDelete($newFile, $oldFile, $id = null)
    {

        if (empty( $newFile ) || empty( $oldFile ) || $newFile == $oldFile)
            return false;

        // 旧文件
        $oldFileArray = explode( ',', $oldFile );

        $tempArray = [];

        // 对比文件
        foreach ($oldFileArray as $value) {

            // 判断数组
            if (!empty( $value ) && strpos( $newFile, $value ) === false)
                $tempArray[] = $value;

        }

        foreach ($tempArray as $value) {

            $fileName = Yii::getAlias( '@backend/../frontend/web/temp/' ) . explode( '/', Yii::$app->controller->id )[1] . DIRECTORY_SEPARATOR . $id . DIRECTORY_SEPARATOR . $value;

            if (!is_file( $fileName ))
                continue;

            @unlink( $fileName );

        }

        return true;
    }

}