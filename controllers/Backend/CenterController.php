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

namespace app\controllers\Backend;

use Yii;
use yii\web\Controller;

class CenterController extends BaseController
{


    /**
     * 首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}