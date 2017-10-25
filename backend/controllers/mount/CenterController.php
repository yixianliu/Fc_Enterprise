<?php

/**
 * @abstract 挂载中心
 * @author   Yxl <zccem@163.com>
 */

namespace backend\controllers\mount;

use Yii;
use yii\web\Controller;

class CenterController extends BaseController
{

    /**
     * @abstract 首页
     */
    public function actionView()
    {
        return $this->render('../view');
    }
}
