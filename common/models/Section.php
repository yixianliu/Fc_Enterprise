<?php
/**
 *
 * 版块模型
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/10/24
 * Time: 18:04
 */
namespace common\models;

use Yii;

class Posts extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%section}}';
    }
}