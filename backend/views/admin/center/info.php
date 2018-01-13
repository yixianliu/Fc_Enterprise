<?php
/**
 *
 * 网站配置信息
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/12
 * Time: 10:33
 */

$this->title = '网站档案';

use yii\helpers\Html;

function quick_dev_insights_phpinfo()
{
    ob_start();
    phpinfo(11);
    $phpinfo = array('phpinfo' => array());

    if (preg_match_all('#(?:<h2>(?:<a name=".*?">)?(.*?)(?:</a>)?</h2>)|(?:<tr(?: class=".*?")?><t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>)?)?</tr>)#s', ob_get_clean(), $matches, PREG_SET_ORDER)) {
        foreach ($matches as $match) {
            if (strlen($match[1])) {
                $phpinfo[ $match[1] ] = array();
            } else if (isset($match[3])) {
                $keys1 = array_keys($phpinfo);
                $phpinfo[ end($keys1) ][ $match[2] ] = isset($match[4]) ? array($match[3], $match[4]) : $match[3];
            } else {
                $keys1 = array_keys($phpinfo);
                $phpinfo[ end($keys1) ][] = $match[2];

            }

        }
    }

    // 初始化
    $data = null;

    if (!empty($phpinfo)) {

        foreach ($phpinfo as $name => $section) {

            $data .= "<h3>$name</h3>\n<table class='table table-hover'>\n";

            foreach ($section as $key => $val) {
                if (is_array($val)) {
                    $data .= "<tr><td>$key</td><td>$val[0]</td><td>$val[1]</td></tr>\n";
                } else if (is_string($key)) {
                    $data .= "<tr><td>$key</td><td>$val</td></tr>\n";
                } else {
                    $data .= "<tr><td>$val</td></tr>\n";
                }
            }
        }
        $data .= "</table>\n";

    } else {
        $data .= "<h3>对不起，phpinfo（）函数不可访问。 也许，它是禁用的<a href='http://php.net/manual/en/function.phpinfo.php'>查看文档</a></h3>";
    }

    return $data;
}

$data = quick_dev_insights_phpinfo();

?>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left"><?= Html::encode($this->title) ?></h2>
        </header>
        <div class="content-body">
            <div class="row" style="word-break : break-all;">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <?= $data ?>

                </div>
            </div>
        </div>
    </section>
</div>
