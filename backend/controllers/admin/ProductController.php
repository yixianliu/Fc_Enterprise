<?php
/**
 *
 * 产品控制器
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/10/26
 * Time: 16:20
 */

namespace backend\controllers\admin;

use Yii;
use yii\data\Pagination;
use backend\models\User;

class ProductController extends BaseController
{

    /**
     * 列表
     *
     * @return string
     */
    public function actionView()
    {
        return $this->render('view');
    }
}