<?php

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */

namespace app\form;

use Yii;
use yii\base\Model;
use app\models\User;

class LoginForm extends Model
{

    public $username;

    public $password;

    public $telphone;

    public $email;

    public $repassword;

    public $rememberMe = true;

    private $_user = false;

    /**
     * 验证规则
     *
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password',], 'required', 'on' => 'login', 'message' => '不能为空'],
            [['username', 'password', 'email', 'telphone', 'repassword'], 'required', 'on' => 'reg'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            ['password', 'compare', 'compareAttribute' => 'repassword', 'on' => 'reg'],
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
            'email'      => '邮箱',
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
            'reg'   => ['username', 'password', 'telphone', 'nickname', 'email', 'repassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array  $params    the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
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
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    public function userReg()
    {
        $Cls = new User();

        $Cls->user_id = time() . '_' . rand(0, 999);
        $Cls->username = $this->username;
        $Cls->password = $this->password;
        $Cls->telphone = $this->telphone;
        $Cls->email = $this->email;

        if (!$Cls->save()) {
            return false;
        }

        return true;
    }
}
