<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_conf`.
 */
class m170930_084628_create_user_conf_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_conf', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_conf');
    }
}
