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

namespace common\models;

use common\models\ItemRp;

class Menu extends \yii\db\ActiveRecord
{

    /**
     * 数据库表名
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * 所有
     *
     * @param $parent
     * @return bool
     */
    public static function findByData($parent)
    {

        if (empty($parent))
            return false;


        return static::find()->where([self::tableName() . '.is_using' => 'On', self::tableName() . '.parent_id' => $parent])
            ->orderBy('sort_id', 'ASC')
            ->joinWith('itemRp')
            ->asArray()
            ->all();
    }

    /**
     *
     * 查找指定菜单
     *
     * @param $id
     */
    public static function findByOne($id)
    {
        if (empty($id)) {
            return false;
        }

        return static::find()->where(['m_key' => $id])
            ->joinWith('itemRp')
            ->asArray()
            ->one();
    }

    // 角色
    public function getItemRp()
    {
        return $this->hasOne(ItemRp::className(), ['name' => 'r_key']);
    }
}