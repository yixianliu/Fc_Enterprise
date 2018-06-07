<?php

namespace frontend\controllers;



use common\models\OnlineMsg;

class CommentController extends BaseController
{

    public function actionIndex()
    {

        $model = new OnlineMsg();

        return $this->render('/default/center/comment', ['model' => $model]);
    }

}
