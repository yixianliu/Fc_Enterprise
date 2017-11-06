<?php

/**
 * 配置父类控制器
 *
 * @author Yxl <zccem@163.com>
 */

namespace backend\controllers\mount;

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
            return $this->redirect(['/frontend/member/login']);
        }

        $session = Yii::$app->session;

        // 检查session是否开启
        if (!$session->isActive) {
//            Yii::$app->getSession()->setFlash('error', 'Session 失败,请检查 !!');
            exit('Session 失败,请检查 !!');
        }

        // 开启session
        $session->open();

        $data = $session->get('MountSession');

        if (empty($data['Username'])) {
            return $this->redirect(['/mount/member/login']);
        }
    }

}