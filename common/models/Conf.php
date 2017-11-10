<?php
/**
 *
 * 网站配置
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/10/27
 * Time: 10:46
 */

namespace common\models;

use Yii;

class Conf extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%conf}}';
    }

    /**
     * 网站配置数据
     *
     * @param null $status
     * @return $this
     */
    public static function findByData($status = null)
    {

        $array = !empty($status) ? ['is_using' => $status] : ['!=', 'is_using', 'null'];

        return static::find()
            ->where($array)
            ->asArray()
            ->all();
    }

}