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

class SeoForm extends Model
{

    public $title = null;

    public $alt = null;

    /**
     * 验证规则
     */
    public function rules()
    {
        return [
            [['alt', 'title'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'alt'   => 'Alt 属性',
            'title' => 'Title 属性',
        ];
    }

}