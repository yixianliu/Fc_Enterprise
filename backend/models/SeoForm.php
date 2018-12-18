<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/6/6
 * Time: 10:31
 */

namespace backend\models;

use yii\base\Model;

class SeoForm extends Model
{

    public $content = null;

    /**
     * 验证规则
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'content' => 'Js 属性',
        ];
    }

}