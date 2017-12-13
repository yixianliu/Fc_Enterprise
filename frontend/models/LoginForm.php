<?php

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

class LoginForm extends Model
{

    public $username;
    public $password;
    public $nickname;
    public $telphone;
    public $repassword;
    public $rememberMe = true;
    private $_user;

    /**
     * 验证规则
     *
     * @return array the validation rules.
     */
    public function rules()
    {
        return [

            // string 字符串，这里我们限定的意思就是username至少包含2个字符，最多255个字符
            ['username', 'string', 'min' => 6, 'max' => 50],
            ['username', 'email'],

            // 注册
            [['username', 'nickname', 'password', 'email', 'telphone', 'repassword'], 'required', 'on' => 'reg'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => '用户名已存在!', 'on' => 'reg'],
            ['repassword', 'compare', 'compareAttribute' => 'password', 'on' => 'reg'],

            // 登录
            [['username', 'password',], 'required', 'on' => 'login', 'message' => '不能为空'],
            ['rememberMe', 'boolean', 'on' => 'login'],
            ['password', 'validatePassword', 'on' => 'login'],
        ];
    }

    /**
     * 设置字段名
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'username'   => '帐号',
            'password'   => '密码',
            'nickname'   => '昵称',
            'telphone'   => '手机号码',
            'repassword' => '二次密码',
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
            'reg'   => ['username', 'password', 'telphone', 'nickname', 'repassword'],
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login(
                $this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0
            );
        }

        return false;
    }

    /**
     * 注册
     *
     * @return bool
     */
    public function userReg()
    {

        $Cls = new User();

        $Cls->user_id = time() . '_' . rand(0, 999);
        $Cls->username = $this->username;
        $Cls->password = $Cls->setPassword($this->password);
        $Cls->nickname = $this->nickname;
        $Cls->telphone = $this->telphone;
        $Cls->grade = 4;

        // 生成 "remember me" 认证key
        $Cls->generateAuthKey();

        if (!$Cls->save(false)) {
            return false;
        }

        return $Cls;
    }

    /**
     * Validates the password.This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {

        if (!$this->hasErrors()) {

            // 获取用户
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, '帐号密码有误!');
            }
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {

        if ($this->_user == null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

}
