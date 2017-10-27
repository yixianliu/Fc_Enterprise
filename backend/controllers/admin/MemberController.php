<?php
/**
 *
 * 登录控制器
 *
 * Created by yixianliu.
 * User: zccem@163.com
 * Date: 2017/6/6
 * Time: 14:15
 */

namespace backend\controllers\admin;

use Yii;
use backend\models\LoginForm;

class MemberController extends BaseController
{

    public $layout = false;

    /**
     * 登录
     */
    public function actionLogin()
    {

        // 是否安装
        if (!file_exists(Yii::getAlias('@webroot') . '/FcCalendar.md')) {
            return $this->redirect(['/mount/member/login']);
        }

        // 是否已经登录
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/admin/center/view']);
        }

        $model = new LoginForm();

        if (Yii::$app->request->isPost) {

            if (!$model->load(Yii::$app->request->post())) {
                Yii::$app->getSession()->setFlash('error', 'POST异常 !!');
            }

            if (!$model->login()) {
                Yii::$app->getSession()->setFlash('error', '登录失败,请检查 !!');
            } else {
                return $this->redirect(['/admin/center/view']);
            }

        }

        return $this->render('../center/login', ['model' => $model]);
    }

    /**
     * 注销
     *
     * @return bool
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return true;
    }
}