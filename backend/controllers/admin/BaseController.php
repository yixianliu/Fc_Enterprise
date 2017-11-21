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

    public function beforeAction($action)
    {

        if (!file_exists(Yii::getAlias('@webroot') . '/' . Yii::$app->params['RD_FILE'])) {
            return $this->redirect(['/mount/member/login']);
        }

        $action = Yii::$app->controller->action->id;

        if (Yii::$app->user->can($action)) {
            return true;
        } else {
            throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限 !!');
        }
    }
}