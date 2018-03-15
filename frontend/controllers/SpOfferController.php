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

    /**
     * 提交价格
     *
     * @param $id
     * @param $type
     * @return \yii\web\Response
     */
    public function actionCreate()
    {

        $id = Yii::$app->request->get('id', null);
        $type = Yii::$app->request->get('type', null);

        if (Yii::$app->user->isGuest)
            return $this->redirect(['/member/reg']);

        if (empty($id) || empty($type))
            return $this->redirect(['/user/index']);

        $model = new SpOffer();

        $model->is_type = $type;
        $model->user_id = Yii::$app->user->identity->user_id;

        if (!empty($model->getErrors())) {
            Yii::$app->getSession()->setFlash('error', $model->getErrors());
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/sp-offer/index']);
        }

        return $this->redirect(Yii::$app->request->referrer);
    }
}
