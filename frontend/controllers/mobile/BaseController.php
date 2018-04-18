<?php
/**
 *
 * 前台手机配置控制器
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/6/18
 * Time: 15:57
 */

namespace frontend\controllers\mobile;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class BaseController extends Controller
{

    // 布局
    public $layout = 'mobile';

    // 构造
    public function init()
    {

        if (!file_exists(Yii::getAlias('@webroot') . '/FcCalendar.md')) {
            return false;
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
            echo '<script language="javascript" type="text/javascript">window.location.href="' . Url::to(['/mobile/member/login']) . '"; </script> ';
            exit(false);
        }

        return true;
    }

}