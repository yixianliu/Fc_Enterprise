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

namespace backend\controllers\admin;

use Yii;
use yii\data\Pagination;
use backend\models\User;

class UserController extends BaseController
{

    /**
     * 列表
     */
    public function actionView()
    {

        $result = User::view();

        $pages = new Pagination(['totalCount' => $result->count(), 'pageSize' => '2']);

        return $this->render('view', ['result' => $result, 'pages' => $pages]);
    }
}
