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
            [['username', 'password'], 'required', 'on' => ['login']],

            // 对username的值进行两边去空格过滤
            [['username', 'password'], 'filter', 'filter' => 'trim', 'on' => ['login']],

            // string 字符串，这里我们限定的意思就是username至少包含2个字符，最多255个字符
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'string', 'min' => 6, 'tooShort' => '密码至少填写6位'],

            // 权限数据包
            [['admin', 'user'], 'required', 'on' => ['power']],
        ];
    }

    /**
     * 场景
     *
     * @return array
     */
    public function scenarios()
    {
        return [
            'login' => ['username', 'password'],
            'power' => ['admin', 'user'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => '帐号',
            'password' => '密码',
            'admin'    => '管理员权限包',
            'user'     => '普通用户权限包',
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
