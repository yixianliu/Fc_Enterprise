<?php

/**
 * 配置父类控制器
 *
 * @author Yxl <zccem@163.com>
 */

namespace app\controllers\Mount;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{

    // 布局
    public $layout = 'mount';

    /**
     * @abstract 构造函数
     */
    public function init()
    {

        if (file_exists(Yii::getAlias('@webroot') . '/FcCalendar.md')) {
            return $this->redirect(['/Frontend/member/login']);
        }

        $session = Yii::$app->session;

        if (empty($session->get('MountAdmin'))) {
            return $this->redirect(['/Mount/member/login']);
        }

        return;
    }

}
