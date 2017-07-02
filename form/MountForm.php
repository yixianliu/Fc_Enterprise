<?php

/**
 * @abstract 挂载中心表单模型
 */

namespace app\form;

use Yii;
use yii\base\Model;

class MountForm extends Model
{

    public $username;
    public $password;
    public $rememberMe = true;
    private $_user = false;

    /**
     * 验证规则
     */
    public function rules()
    {

        return [

            // dbhost
            [
                [
                    'username'
                ],
                'required',
                'message' => '帐号不可为空 !!'
            ],

            // dbname
            [
                [
                    'password'
                ],
                'required',
                'message' => '密码不可为空 !!'
            ]
        ];
    }

    /**
     * @abstract 登录
     */
    public function mLogin()
    {

        // 调用validate方法对表单数据进行验证，验证规则参考上面的rules方法
        if (!$this->validate()) {
            return FALSE;
        }

        if ($this->username != Yii::$app->params['Username'] || $this->password != Yii::$app->params['Password']) {
            return FALSE;
        }

        return TRUE;
    }

}
