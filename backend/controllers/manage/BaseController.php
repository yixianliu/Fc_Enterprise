<?php

namespace backend\controllers\manage;

use Yii;

class BaseController extends \yii\web\Controller
{

    public $layout = 'manage';

    /**
     * 前置函数
     *
     * @param $action
     *
     * @return bool|void|\yii\web\Response
     * @throws \yii\web\UnauthorizedHttpException
     */
    public function beforeAction($action)
    {

        if (!file_exists(Yii::getAlias('@webroot') . '/' . Yii::$app->params['RD_FILE'])) {
            return $this->redirect(['/mount/member/login']);
        }

        return true;
    }

    public function init()
    {

        parent::init(); // TODO: Change the autogenerated stub

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/manage/member/login']);
        }

        return true;
    }


}
