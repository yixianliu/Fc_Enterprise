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
        parent::init(); // TODO: Change the autogenerated stub

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/admin/member/login']);
        }

        return true;
    }

    public function beforeAction($action)
    {

        if (!file_exists(Yii::getAlias('@webroot') . '/' . Yii::$app->params['RD_FILE'])) {
            return $this->redirect(['/mount/member/login']);
        }

        $action = Yii::$app->controller->action->id;

        $controllerID = Yii::$app->controller->id;

        $power = $action . ucfirst(explode('/', $controllerID)[1]);

        if (!Yii::$app->user->can($power)) {
//            throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限 !!');
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
                    "imageUrlPrefix"       => Yii::$app->request->getHostInfo() . '/', // 图片访问路径前缀
                    "imagePathFormat"      => "/UEditor/temp/{yyyy}{mm}{dd}/{time}{rand:6}", // 上传保存路径
                    "imageRoot"            => Yii::getAlias("@webroot"),
                    "imageManagerListPath" => Yii::getAlias("@web") . "/UEditor/product",
                ],
            ]
        ];
    }
}