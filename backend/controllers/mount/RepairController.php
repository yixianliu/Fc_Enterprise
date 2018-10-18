<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/10/18
 * Time: 11:02
 */

namespace backend\controllers\mount;

use common\models\Conf;
use common\models\Menu;
use Yii;

class RepairController extends BaseController
{

    public function actionIndex()
    {
        return $this->render( '/mount/repair' );
    }

    /**
     * 网站配置表
     *
     * @return bool
     * @throws \yii\db\Exception
     */
    public function actionConf()
    {

        if (!Yii::$app->request->isAjax) {

        }

        $tableSchema = Yii::$app->db->schema->getTableSchema( Conf::tableName() );

        $fieldsArray = \yii\helpers\ArrayHelper::getColumn( $tableSchema->columns, 'name', false );

        // 不存在此字段,就添加
        if (!in_array( 'is_language', $fieldsArray )) {
            Yii::$app->db->createCommand( 'alter table ' . Conf::tableName() . ' add column is_language varchar(25)' )->execute();
        }

        // 字段属性不对,需要修改
        if ($tableSchema->columns['is_language']->type != 'string' || $tableSchema->columns['is_language']->size != 25) {
            Yii::$app->db->createCommand( 'alter table ' . Conf::tableName() . ' modify column is_language varchar(25)' )->execute();
        }

        return true;
    }

    public function actionMenu()
    {

        $tableSchema = Yii::$app->db->schema->getTableSchema( Menu::tableName() );

        $fieldsArray = \yii\helpers\ArrayHelper::getColumn( $tableSchema->columns, 'name', false );

        // 不存在此字段,就添加
        if (!in_array( 'is_language', $fieldsArray )) {
            Yii::$app->db->createCommand( 'alter table ' . Conf::tableName() . ' add column is_language varchar(25)' )->execute();
        }

        // 字段属性不对,需要修改
        if ($tableSchema->columns['is_language']->type != 'string' || $tableSchema->columns['is_language']->size != 25) {
            Yii::$app->db->createCommand( 'alter table ' . Conf::tableName() . ' modify column is_language varchar(25)' )->execute();
        }

        return true;
    }
}