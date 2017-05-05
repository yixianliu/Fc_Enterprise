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

}
