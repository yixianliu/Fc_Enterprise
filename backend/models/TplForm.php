<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/6/6
 * Time: 10:31
 */

namespace backend\models;

use Yii;
use yii\base\Model;

class TplForm extends Model
{

    public $content = null;
    public $fileName = null;
    public $path = null;

    /**
     * 验证规则
     */
    public function rules()
    {
        return [
            [['content', 'path', 'fileName'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'content'  => '模板内容',
            'fileName' => '文件名',
            'path'     => '模板路径',
        ];
    }

}