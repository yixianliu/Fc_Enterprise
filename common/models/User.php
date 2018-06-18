<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{

    public $password_hash;
    public $msg;
    public $newpassword;
    public $repassword;
    public $auth_key;
    public $rememberMe = true;

    private $_user;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%User}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id'       => '用户编号',
            'username'      => '帐号',
            'nickname'      => '昵称',
            'is_using'      => '是否通过审核',
            'login_ip'      => '登录 IP',
            'r_key'         => '角色',
            'sex'           => '性别',
            'birthday'      => '出生年月日',
            'consecutively' => '连续登录天数',
            'password'      => '密码',
            'signature'     => '个性签名',
            'is_display'    => '是否显示资料',
            'is_auth'       => '是否通过企业验证',
            'is_head'       => '是否上传头像',
            'created_at'    => '添加数据时间',
            'updated_at'    => '更新数据时间',

            'job'         => '所属职位',
            'repassword'  => '二次密码',
            'newpassword' => '新密码',
            'is_type'     => '用户类型',
            'msg'         => '短信验证码',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            // 后台
            [['username', 'sex', 'r_key', 'is_using', 'is_auth'], 'required', 'on' => 'backend'],

            // 注册
            [['username', 'is_type', 'password', 'repassword'], 'required', 'on' => 'reg'],

            // 资料修改
            [['nickname', 'sex'], 'required', 'on' => 'info'],

            // 登录
            [['username', 'password',], 'required', 'on' => 'login'],

            // 修改密码
            [['password', 'newpassword', 'repassword'], 'required', 'on' => 'setpsw'],
            ['repassword', 'compare', 'compareAttribute' => 'newpassword', 'on' => 'setpsw'],

            // 对username的值进行两边去空格过滤
            [['username', 'password', 'nickname',], 'filter', 'filter' => 'trim'],
            [['username'], 'match', 'pattern' => '/^1[0-9]{10}$/', 'message' => '{attribute}必须为1开头的11位纯数字'],
            [['nickname', 'username'], 'unique', 'targetClass' => '\common\models\User'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => '用户名已存在!'],
            ['repassword', 'compare', 'compareAttribute' => 'password', 'on' => ['reg', 'backend']],
            ['rememberMe', 'boolean',],
            ['password', 'validatePassword', 'on' => ['login', 'setpsw']],
            [['username'], 'unique', 'on' => 'reg'],

            // 默认
            [['signature'], 'default', 'value' => null],
            [['exp', 'credit', 'birthday'], 'default', 'value' => 0],
        ];
    }

    /**
     * 场景
     *
     * @return array
     */
    public function scenarios()
    {
        // 在该场景下的属性进行验证，其他场景和没有on的都不会验证
        return [
            'backend' => ['username', 'password', 'r_key', 'sex', 'nickname', 'user_id', 'repassword'],
            'login'   => ['username', 'password'],
            'reg'     => ['username', 'password', 'repassword', 'is_type', 'msg'],
            'setpsw'  => ['password', 'newpassword', 'repassword'],
            'info'    => ['nickname', 'sex', 'enterprise', 'signature'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];

        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * 注册
     *
     * @return bool
     */
    public function userReg()
    {

        $this->user_id = time() . '_' . rand(0000, 9999);
        $this->r_key = 'admin';
        $this->is_using = 'Not';
        $this->password = md5($this->password);

        $this->generateAuthKey();

        return $this->save(false) ? true : false;
    }

    /**
     * 修改密码
     *
     * @return bool
     */
    public function setPsw($password)
    {

        $data = static::findByUsername($this->username);

        if (md5($password) != $data->password)
            return false;

        return $this->save(false) ? true : false;
    }

    /**
     * 登录
     *
     * @return bool
     */
    public function login()
    {

        $data = static::findByUsername($this->username);

        if (empty($data))
            return false;

        if (md5($this->password) == $data->password) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
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

        if ($this->_user == null) {
            $this->_user = static::findByUsername($this->username);
        }

        return $this->_user;
    }

}
