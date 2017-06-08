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

namespace app\controllers\Backend;

use Yii;
use yii\web\Controller;
use yii\helpers\Json;
use app\form\BackendLoginForm;

class MemberController extends Controller
{

    public $layout = false;

    /**
     * 登录
     */
    public function actionLogin()
    {

        $model = new BackendLoginForm();

        if (Yii::$app->request->isPost) {

            if ($model->load(Yii::$app->request->post())) {

                if (!$model->login()) {
                    return Json::encode(['msg' => '登录失败,请检查 !!']);
                }

                return Json::encode(['msg' => '登录成功 !!', 'status' => true]);
            }

            return ['msg' => 'POST异常 !!'];
        }

        return $this->render('login', ['model' => $model]);
    }

    /**
     * 注销
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return;
    }
}