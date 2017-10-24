<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_conf`.
 */
class m171024_103515_create_user_conf_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_conf', [

            'id' => $this->primaryKey(),

            'conf_id' => $this->integer(11)->notNull(),
            'user_id' => $this->string(55)->notNull()->unique(),
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
