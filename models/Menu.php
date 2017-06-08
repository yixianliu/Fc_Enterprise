<?php
/**
 *
 * 菜单模型
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/6/7
 * Time: 11:22
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Menu extends ActiveRecord
{

    /**
     * @abstract 数据库表名
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @abstract 所有
     * @param string $parent 父类ID
     */
    public static function view($parent)
    {

        if (empty($parent)) {
            return false;
        }

        return static::find()->where(['is_using' => 'On', 'parent_id' => $parent])->orderBy('sort_id', 'ASC');
    }

}