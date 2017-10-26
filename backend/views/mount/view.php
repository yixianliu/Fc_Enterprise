<?php
/**
 *
 * 挂载中心首页
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/10/16
 * Time: 17:51
 */

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
        $data .= "<h3>Sorry, the phpinfo() function is not accessable. Perhaps, it is disabled<a href='http://php.net/manual/en/function.phpinfo.php'>See the documentation.</a></h3>";
    }

    return $data;
}

$data = quick_dev_insights_phpinfo();

?>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">网站信息</h2>
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <?= $data ?>

                </div>
            </div>
        </div>
    </section>
</div>
