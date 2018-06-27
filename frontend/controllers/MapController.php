<?php

namespace frontend\controllers;

use Yii;
use common\models\Conf;

class MapController extends BaseController
{
    public function actionIndex()
    {

        // 初始化
        $result = array();

        $confData = Conf::findByData('On', Yii::$app->session['language']);

        if (!empty($confData)) {
            foreach ($confData as $key => $value) {
                $result[ $value['c_key'] ] = $value['parameter'];
            }
        }

        $result['MapUrl'] = 'https://j.map.baidu.com/WB5HP';

        return $this->render('/default/center/map', ['result' => $result]);
    }

}
