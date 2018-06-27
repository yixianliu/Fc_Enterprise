<?php

namespace frontend\controllers;

use Yii;
use common\models\OnlineMsg;

class CommentController extends BaseController
{

    public function actionIndex()
    {

        $model = new OnlineMsg();

        $model->user_id = '网站游客';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->getSession()->setFlash('success', '发布成功 !!');

            return $this->redirect(['/comment/index']);
        }

        Yii::$app->getSession()->setFlash('error', '无法发布留言 !!');

        return $this->render('/default/center/comment', ['model' => $model]);
    }

}
