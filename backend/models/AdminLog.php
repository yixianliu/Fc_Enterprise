<?php
/**
 *
 * 操作记录/
 *
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/22
 * Time: 10:20
 */

namespace backend\models;

use Yii;
use yii\base\Model;

class AdminLog extends Model
{

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => '操作记录ID',
            'title'       => '操作记录描述',
            'addtime'     => '记录时间',
            'admin_name'  => '操作人姓名',
            'admin_ip'    => '操作人IP地址',
            'admin_agent' => '操作人浏览器代理商',
            'controller'  => '操作控制器名称',
            'action'      => '操作类型',
            'objId'       => '操作数据编号',
            'result'      => '操作结果',
        ];
    }

    public static function viewLog()
    {

    }

    /**
     * 保存日志
     *
     * @param array $data
     *
     * @return bool
     */
    public static function saveLog($data = [])
    {

        $xmlPath = Yii::getAlias('@webroot') . '/log/' . date('Y-m-d', time()) . '.xml';

        if (file_exists($xmlPath)) {

            $xmlStr = file_get_contents($xmlPath);

            $dom = new SimpleXMLElement($xmlStr);

            $dom->load($xmlPath);

        } else {

            // 创建一个XML文档并设置XML版本和编码。。
            $dom = new DomDocument('1.0', 'utf-8');

        }

        $user = $dom->addChild('Log');
        $user->addChild('email', 'test');
        $user->addChild('time', 'test');
        $user->addChild('ip', '127.0.0.1');

        return true;

    }

}