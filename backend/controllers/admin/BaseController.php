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

namespace app\controllers\Backend;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    public $layout = 'backend';

    public function init()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/Backend/member/login']);
        }

        return;
    }
}