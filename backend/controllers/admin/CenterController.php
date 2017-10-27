<?php
/**
 *
 * 管理中心控制器
 *
 * Created by yixianliu.
 * User: zccem@163.com
 * Date: 2017/6/6
 * Time: 11:49
 */

namespace backend\controllers\admin;

use Yii;
use yii\web\Controller;

class CenterController extends BaseController
{

    /**
     * 首页
     */
    public function actionView()
    {
        return $this->render('view');
    }
}