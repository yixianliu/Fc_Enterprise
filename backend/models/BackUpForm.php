<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/6/5
 * Time: 10:53
 */

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

class BackUpForm extends ActiveRecord
{

    public static $DbData_Path = "Db_Backup_Data";

    public function init()
    {
        header("Content-type: text/html;charset=utf-8");
    }

    /*
    *   获取所有数据表
    */
    protected function getTables()
    {
        return Yii::$app->db->getSchema()->getTableNames();
    }

    /*
    * 备份地址
    */
    protected function getBackUpPath()
    {

        $path = Yii::getAlias('@webroot') . '/' . static::$DbData_Path;

        if (!file_exists($path)) {
            @mkdir($path, 0777);
        }

        return $path;
    }

    /*
    *   文件名称
    */
    protected function makeFileName()
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $name = '';
        for ($i = 0; $i < 5; $i++) {
            $name .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }

        return date("Ymd") . '_' . $name . '.sql';
    }

    /*
    * 给字段、表名 加上`
    */
    protected function addStyle($str)
    {
        return "`{$str}`";
    }

    /*
    *   获取表结构
    */
    protected function getTableStructure($table)
    {
        $data = Yii::$app->db->createCommand('SHOW CREATE TABLE ' . $table)->queryAll();

        return $data[0]['Create Table'];
    }

    /*
    *   获取表数据
    */
    protected function getTableDatas($table)
    {

        $data = Yii::$app->db->createCommand('SELECT * FROM ' . $table)->queryAll();
        $fields = '';
        $values = '';
        $content = '';

        foreach ($data as $key => $val) {
            $fields = array_keys($val);
            $values = array_values($val);
            $sql = "INSERT INTO " . $this->addStyle($table) . " (";
            $sql .= "`" . implode("`, `", $fields) . "`) VALUES (";
            $sql .= "'" . implode("', '", $values) . "'); \r\n";
            $content .= $sql;
        }

        return $content;
    }

    /**
     * 备份数据库
     */
    public function backUp()
    {

        $tables = $this->getTables();
        $path = $this->getBackUpPath();
        $fileName = $this->makeFileName();
        $content = "SET FOREIGN_KEY_CHECKS=0; \r\n";

        foreach ($tables as $key => $val) {
            $content .= "DROP TABLE IF EXISTS " . $this->addStyle($val) . ";\r\n";
            $content .= $this->getTableStructure($val);
            $content .= ";\r\n";
            $content .= $this->getTableDatas($val);
            $content .= "\r\n";
        }

        $back_path = $this->getBackUpPath();
        $file_name = $this->makeFileName();
        $file = $back_path . '/' . $file_name;
        $fp = fopen($file, 'w');

        @fwrite($fp, $content);
        fclose($fp);

        return true;
    }

    /*
    * 获取所有的sql文件
    */
    public function getSqlFiles()
    {
        $path = Yii::getAlias('@webroot') . '/' . static::$DbData_Path;

        $sqls = [];

        if (file_exists($path)) {
            $dir_handle = @opendir($path);
            while ($file = @readdir($dir_handle)) {

                $file_info = pathinfo($file);

                if ($file_info['extension'] == 'sql') {
                    $sql['name'] = $file;
                    $sql['create_time'] = date('Y-m-d', filectime($path . '/' . $file));
                    $sqls[] = $sql;
                }
            }
        }

        return $sqls;
    }

    /**
     * 还原数据库
     *
     * @param $sqlFileName
     * @throws \yii\db\Exception
     */
    public function recoverSqlFile($sqlFileName)
    {
        $path = Yii::getAlias('@webroot') . '/' . static::$DbData_Path;

        $sqlFile = $path . '/' . $sqlFileName;

        if (file_exists($sqlFile)) {
            $sqls = file_get_contents($sqlFile);
            Yii::$app->db->createCommand($sqls)->execute();
        }


    }

    /*
    * 删除数据备份
    */
    public function deleteSqlFile($sqlFileName)
    {
        $path = Yii::getAlias('@webroot') . '/' . static::$DbData_Path;

        $sqlFile = $path . '/' . $sqlFileName;

        if (file_exists($sqlFile)) {
            @unlink($sqlFile);
        }
    }
}

;
