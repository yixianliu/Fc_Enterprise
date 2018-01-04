<?php

namespace frontend\controllers;

use Yii;
use common\models\Product;
use common\models\ProductClassify;
use common\models\ProductClassifySearch;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductClsController implements the CRUD actions for ProductClassify model.
 */
class ProductClsController extends BaseController
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
     * Lists all ProductClassify models.
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

        return $this->render('../product/cls', [
            'dataProvider' => $dataProvider,
            'result'       => $result,
        ]);
    }


}
