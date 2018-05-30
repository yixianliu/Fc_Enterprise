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

        if (file_exists(Yii::getAlias('@webroot') . '/' . Yii::$app->params['RD_FILE'])) {
            return $this->redirect(['/admin/member/login']);
        }

        $session = Yii::$app->session;

        // 开启session
        $session->open();

        // 检查session是否开启
        if (!$session->isActive) {
            exit('Session 失败,请检查 !!');
        }

        $data = $session->get('MountSession');

        if (empty($data['Username'])) {
            return $this->redirect(['/mount/member/login']);
        }
    }

}
