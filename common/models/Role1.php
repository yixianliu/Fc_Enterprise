<?php
/**
 *
 * 角色模型
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/6/7
 * Time: 11:23
 */

namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Role1 extends Model
{

    /**
     * @abstract 数据库表名
     */
    public static function tableName()
    {
        return '{{%role}}';
    }

    /**
     * @abstract 所有
     */
    public static function findAllSection($status = null)
    {

        if (!empty($status)) {
            $array = array(
                self::tableName() . '.is_using' => $status
            );
        } // null
        else {
            $array = array(
                '!=', self::tableName() . '.is_using', 'null'
            );
        }

        return static::find()->select(Role1::tableName() . ".name as rname, " . self::tableName() . ".*")
            ->joinWith('role')
            ->where($array)
            ->asArray();
    }
}