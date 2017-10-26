<?php

/**
 * @abstract 挂载中心表单模型
 * @author Yxl <zccem@163.com>
 */

namespace backend\models;

use yii\base\Model;

class MountRunForm extends Model
{

    public $db_name;
    public $mysql_data;

    /**
     * 验证规则
     */
    public function rules()
    {
        return [
            [['db_name', 'mysql_data'], 'required'],
        ];
    }

    /**
     * @abstract 标签
     * @return type
     */
    public function attributeLabels()
    {
        return [
            'db_name'    => '数据库名称',
            'mysql_data' => '数据库包',
        ];
    }
}
