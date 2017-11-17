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
use yii\web\Controller;
use backend\models\LoginForm;
use common\models\Conf;

class MemberController extends Controller
{

    public $layout = false;

    /**
     * 登录
     */
    public function actionLogin()
    {

        $confData = Conf::findByData('On');

        if (!empty($confData)) {
            foreach ($confData as $key => $value) {
                Yii::$app->params['Conf'][ $value['c_key'] ] = $value['parameter'];
            }
        }

        // 是否安装
        if (!file_exists(Yii::getAlias('@webroot') . '/' . Yii::$app->params['RD_FILE'])) {
            return $this->redirect(['/mount/member/login']);
        }

        // 是否已经登录
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/admin/center/index']);
        }

        $model = new LoginForm();

        if (Yii::$app->request->isPost) {

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                if ($model->login()) {

                    // 授权
                    $auth = Yii::$app->authManager;
                    $auth->assign(Yii::$app->user->identity->r_key, Yii::$app->user->identity->user_id);

                    return $this->redirect(['/admin/center/index']);
                }

                Yii::$app->getSession()->setFlash('error', '登录失败,请检查 !!');
            }

            Yii::$app->getSession()->setFlash('error', '帐号密码有误 !!');
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

        return $this->redirect(['/admin/member/login']);
    }
}