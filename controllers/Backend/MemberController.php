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

class MemberController extends Controller
{

    public $layout = false;

    /**
     * 登录
     */
    public function actionLogin()
    {
        return $this->render('login');
    }
}