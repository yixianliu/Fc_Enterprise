<?php
/**
 *
 * 手机版的首页
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/31
 * Time: 16:02
 */

namespace frontend\controllers\mobile;

use Yii;
use common\models\News;
use common\models\Product;
use yii\filters\VerbFilter;

/**
 * NewsController implements the CRUD actions for News model.
 */
class CenterController extends BaseController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => [ 'POST' ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        // 初始化
        $result = [];

        $result['product'] = Product::findByAll();

        $result['news'] = News::findByAll();

        return $this->render( 'index', [ 'result' => $result ] );
    }
}