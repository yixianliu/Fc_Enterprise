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
use yii\helpers\Json;

class BaseController extends Controller
{

    // 布局
    public $layout = 'default';

    public function init()
    {

        if (!file_exists(Yii::$app->basePath . '/FcCalendar.md')) {
            return $this->redirect(['/Mount/center/view']);
        }

        $session = Yii::$app->session;

        // 检查 SESSION 是否开启
        if ($session->isActive) {
            return Json::encode(['msg' => 'SESSION 失败,请检查 !!']);
        }

        // 开启 SESSION
        $session->open();

        return;
    }

}