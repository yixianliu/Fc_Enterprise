<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/22
 * Time: 9:27
 */

namespace backend\controllers\admin;

use Yii;
use backend\models\AdminLog;

/**
 * PagesController implements the CRUD actions for Pages model.
 */
class VisitorController extends BaseController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {

        $model = new AdminLog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);

        }

        return $this->render('create', ['model' => $model,]);
    }

}
