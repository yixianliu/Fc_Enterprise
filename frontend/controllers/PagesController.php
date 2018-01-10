<?php

namespace frontend\controllers;

use common\models\Menu;
use Yii;
use common\models\Pages;
use common\models\PagesList;
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

        $model = Pages::findOne(['is_using' => 'On', 'c_key' => $id]);

        // 所属菜单
        $result['menu'] = Menu::findOne(['is_using' => 'On', 'custom_key' => $id]);

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

        // 所属菜单
        $result['menu'] = Menu::findOne(['is_using' => 'On', 'custom_key' => $model->c_key]);

        if (!file_exists($filename)) {
            return false;
        }

        return $this->render('view', [
            'model'  => $model,
            'result' => $result,
        ]);
    }

    /**
     * 单页面列表
     *
     * @param $id
     * @return string
     */
    public function actionList($id)
    {

        $model = Pages::findOne(['is_using' => 'On', 'page_id' => $id]);

        $result['content'] = PagesList::find()->where(['is_using' => 'On', 'page_id' => $id])->all();

        // 所属菜单
        $result['menu'] = Menu::findOne(['is_using' => 'On', 'custom_key' => $model->c_key]);

        return $this->render('list', [
            'model'  => $model,
            'result' => $result,
        ]);
    }

    /**
     * 单页面内容详情
     *
     * @param $id
     * @return string
     */
    public function actionDetails($id)
    {

        $model = PagesList::findOne(['is_using' => 'On', 'id' => $id]);

        // 列表
        $result['parent'] = Pages::findOne(['is_using' => 'On', 'page_id' => $model->page_id]);

        // 所属菜单
        $result['menu'] = Menu::findOne(['is_using' => 'On', 'custom_key' => $result['parent']['c_key']]);

        return $this->render('details', [
            'model'  => $model,
            'result' => $result,
        ]);
    }
}
