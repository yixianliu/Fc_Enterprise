<?php

namespace frontend\controllers;

use common\models\PagesList;
use Yii;
use common\models\Pages;
use common\models\PagesClassifySearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PagesController implements the CRUD actions for Pages model.
 */
class PagesController extends BaseController
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
     * Lists all Pages models.
     * @return mixed
     */
    public function actionIndex($id)
    {

        $model = Pages::findOne(['is_using' => 'On', 'page_id' => $id]);

        $result = PagesList::findAll(['is_using' => 'On', 'page_id' => $model->page_id]);

        return $this->render('index', [
            'model'  => $model,
            'result' => $result,
        ]);
    }

    /**
     * Displays a single Pages model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $model = Pages::findOne(['is_using' => 'On', 'page_id' => $id]);

        // 判断文件
        $filename = Yii::getAlias('@frontend') . '/views/pages/' . $model->path;

        if (!file_exists($filename)) {
            return false;
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionDetails($id)
    {

    }
}
