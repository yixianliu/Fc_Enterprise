<?php

namespace frontend\controllers;

use Yii;
use common\models\NewsClassify;
use common\models\News;
use common\models\NewsClassifySearch;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsClsController implements the CRUD actions for NewsClassify model.
 */
class NewsClsController extends BaseController
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
     * Lists all NewsClassify models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query'      => News::find(['is_using' => 'On', 'c_key' => $id]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $result['classify'] = NewsClassify::findAll(['is_using' => 'On']);

        return $this->render('../news/cls', [
            'dataProvider' => $dataProvider,
            'result'       => $result,
        ]);
    }

}
