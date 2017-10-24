<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_conf`.
 */
class m170930_084628_create_power_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('power', [

            'id' => $this->primaryKey(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('power');
    }
}
