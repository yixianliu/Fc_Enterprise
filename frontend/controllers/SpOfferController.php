<?php

namespace frontend\controllers;

use common\models\SpOffer;
use yii\data\ActiveDataProvider;
use Yii;

class SpOfferController extends BaseController
{

    public function actionIndex()
    {

        $query = SpOffer::find()->where(['user_id' => Yii::$app->user->identity->user_id]);

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider(['query' => $query]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate($id, $type)
    {

        if (Yii::$app->user->isGuest)
            return $this->redirect(['/member/reg']);

        if (empty($id) || empty($type))
            return $this->redirect(['/user/index']);

        $model = new SpOffer();

        $model->is_type = $type;
        $model->offer_id = $id;
        $model->user_id = Yii::$app->user->identity->user_id;
        $model->is_using = 'Off';

        if (!$model->load(Yii::$app->request->post()) || !$model->save()) {
            return $this->redirect(['/user/index']);
        }

        return $this->redirect(['/sp-offer/index']);
    }
}
