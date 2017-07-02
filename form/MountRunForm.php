<?php

/**
 * @abstract 挂载中心表单模型
 * @author Yxl <zccem@163.com>
 */

namespace app\form;

use yii\base\Model;

class MountRunForm extends Model
{

    public $agreement = NULL;

    /**
     * 验证规则
     */
    public function rules()
    {

        return [
            [
                [
                    'agreement'
                ],
                'required',
                'message' => '没有同意协议 !!'
            ],
        ];
    }

}
