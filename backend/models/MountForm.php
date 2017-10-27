<?php

/**
 * @abstract 挂载中心表单模型
 */

namespace backend\models;

use Yii;
use yii\base\Model;

class MountForm extends Model
{

    public $username;
    public $password;
    public $rememberMe = true;

    /**
     * 验证规则
     */
    public function rules()
    {

        return [
            [['username', 'password'], 'required'],
        ];
    }

    /**
     * @abstract 标签
     * @return type
     */
    public function attributeLabels()
    {
        return [
            'username' => '帐号',
            'password' => '密码',
        ];
    }

    /**
     * @abstract 登录
     */
    public function mLogin()
    {

        if ($this->username != Yii::$app->params['Username'] || $this->password != Yii::$app->params['Password']) {
            return false;
        }

        return true;
    }

}
