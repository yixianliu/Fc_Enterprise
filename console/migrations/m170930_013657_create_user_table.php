<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170930_013657_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {

        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id'              => $this->primaryKey(),
            'username'        => $this->string(85)->notNull()->unique(),
            'password'        => $this->string(255)->notNull(),
            'nickname'        => $this->string(85)->notNull()->unique(),
            'signature'       => $this->text()->null(),
            'exp'             => $this->integer(11)->null()->defaultValue(100),
            'credit'          => $this->integer(11)->null()->defaultValue(1),
            'telphone'        => $this->string(25)->null()->defaultValue('+86'),
            'birthday'        => $this->dateTime()->null(),
            'last_login_time' => $this->dateTime()->null(),
            'reg_time'        => $this->dateTime()->null(),
            'consecutively'   => $this->integer()->null()->defaultValue(0),
            'sex'             => $this->string(25)->null(),
            'is_display'      => $this->string(25)->null()->defaultValue('On'),
            'is_head'         => $this->string(25)->null()->defaultValue('On'),
            'is_security'     => $this->string(25)->null()->defaultValue('On'),
            'is_using'        => $this->string(25)->null()->defaultValue('On'),
            'grade'           => $this->integer(11)->null()->defaultValue(3),
        ], $tableOptions);

        // creates index for column `author_id`
        $this->createIndex('idx-user-username', '{{%user}}', 'username');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
