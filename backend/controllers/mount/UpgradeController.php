<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/10/18
 * Time: 10:11
 */
namespace backend\controllers\mount;

use Yii;

class UpgradeController extends BaseController
{

    public function actionIndex()
    {

        if (Yii::$app->request->isPost){

        }

        return $this->render('mount/upgrade');
    }
}