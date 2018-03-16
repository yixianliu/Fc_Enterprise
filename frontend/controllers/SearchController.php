<?php
/**
 * 搜索控制器
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/3/16
 * Time: 10:46
 */

namespace frontend\controllers;

use Yii;
use common\models\ProductClassify;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Sort;

/**
 * PurchaseController implements the CRUD actions for Purchase model.
 */
class SearchController extends BaseController
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionProduct()
    {

        $sort = new Sort([
            'attributes' => [
                'title',
                'product_id' => [
                    'asc'     => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
                    'desc'    => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label'   => 'Name',
                ],
            ],
        ]);

        $title = Yii::$app->request->get('title', null);

        $model = (empty($title)) ? Product::find() : Product::find()->where(['like', 'title', $title]);

        $dataProvider = new ActiveDataProvider([
            'query'      => $model->orderBy($sort->orders),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $result['classify'] = ProductClassify::findAll(['is_using' => 'On', 'parent_id' => 'C0']);


        return $this->render('/product/index', [
            'dataProvider' => $dataProvider,
            'result'       => $result,
        ]);
    }

}