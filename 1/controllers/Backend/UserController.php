<?php
/**
 *
 * 用户控制器
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/6/7
 * Time: 10:09
 */

namespace app\controllers\Backend;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\User;

class UserController extends BaseController
{

    /**
     * 列表
     */
    public function actionIndex()
    {

        $result = User::view();

        $pages = new Pagination(['totalCount' => $result->count(), 'pageSize' => '2']);

        return $this->render('index', ['result' => $result, 'pages' => $pages]);
    }
}
