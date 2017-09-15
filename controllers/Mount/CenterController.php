<?php

/**
 * @abstract 挂载中心
 * @author   Yxl <zccem@163.com>
 */

namespace app\controllers\Mount;

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

    /**
     * @abstract 关于我们
     */
    public function actionAbout()
    {
        return $this->render('../about');
    }

    /**
     * @abstract 联系我们
     */
    public function actionContact()
    {
        return $this->render('../contact');
    }

}
