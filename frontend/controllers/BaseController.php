<?php
/**
 *
 * 前台配置控制器
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/6/18
 * Time: 15:57
 */

namespace app\controllers\Frontend;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{

    // 布局
    public $layout = 'default';

    // 构造
    public function init()
    {

        if (!file_exists(Yii::getAlias('@webroot') . '/FcCalendar.md')) {
            return $this->redirect(['/Mount/center/view']);
        }

        return;
    }

    /**
     * 判断用户
     *
     * @return void|\yii\web\Response
     */
    public function isUser()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/Frontend/member/login']);
        }

        return ;
    }

}