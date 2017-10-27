<?php

/**
 * @abstract 挂载中心表单模型
 * @author Yxl <zccem@163.com>
 */

namespace backend\models;

use yii\base\Model;

class MountRunForm extends Model
{

    public $name;
    public $title;
    public $mysql_data;

    /**
     * 验证规则
     */
    public function rules()
    {
        return [
            [['name', 'mysql_data', 'title'], 'required'],
        ];
    }

    /**
     * @abstract 标签
     * @return type
     */
    public function attributeLabels()
    {
        return [
            'name'       => '网站名称',
            'title'      => '网站标题',
            'mysql_data' => '数据库包',
        ];
    }
}
