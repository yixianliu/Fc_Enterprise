<?php

namespace frontend\controllers;

use Yii;
use common\models\ProductClassify;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Sort;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends BaseController
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

    /**
     * Lists all Product models.
     *
     * @param null $id
     * @return string
     */
    public function actionIndex($id = null)
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

        $model = (empty($id) || $id == 1) ? Product::find() : Product::find()->where(['c_key' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query'      => $model->orderBy($sort->orders),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $result['classify'] = ProductClassify::findAll(['is_using' => 'On', 'parent_id' => ProductClassify::$parent_cly_id]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'result'       => $result,
        ]);
    }

    /**
     * Displays a single Product model.
     *
     * @param $id
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {

        $model = Product::findByOne($id);

        if (empty($model)) {
            throw new NotFoundHttpException( '没有此产品!' );
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

}
