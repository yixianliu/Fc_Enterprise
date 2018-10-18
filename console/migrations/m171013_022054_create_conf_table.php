<?php

use yii\db\Migration;

/**
 * Handles the creation of table `conf`.
 */
class m171013_022054_create_conf_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable( 'conf', [

            'id' => $this->primaryKey(),

        ] );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable( 'conf' );
    }
}
