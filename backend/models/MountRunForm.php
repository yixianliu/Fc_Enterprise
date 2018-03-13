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
            'name'        => '网站名称',
            'title'       => '网站标题',
            'person'      => '公司负责人',
            'address'     => '公司地址',
            'phone'       => '联系电话',
            'keywords'    => '网站关键词',
            'description' => '网站描述',
            'developers'  => '网站开发团队',
            'mysql_data'  => '数据库包',
        ];
    }
}
