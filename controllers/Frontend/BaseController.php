<?php

/**
 * 配置控制
 *
 * @author Yxl <zccem@163.com>
 */

namespace app\controllers\Frontend;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class BaseController extends Controller {

    // 布局
    public $layout = 'default';

    public function init() {

        $session = Yii::$app->session;

        // 检查 SESSION 是否开启
        if ($session->isActive) {
            return \yii\helpers\Json::encode(['msg' => 'SESSION 失败,请检查 !!']);
        }

        // 开启 SESSION
        $session->open();

        if ($session->get('Front.username')) {

        }

        return;
    }

}
