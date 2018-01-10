<?php

namespace frontend\controllers;

use common\models\ProductClassify;
use Yii;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query'      => Product::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $result['classify'] = ProductClassify::findAll(['is_using' => 'On', 'parent_id' => 'C0']);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'result' => $result,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $model = Product::findOne(['id' => $id]);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

}
