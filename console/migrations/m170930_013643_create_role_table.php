<?php

use yii\db\Migration;

/**
 * Handles the creation of table `role`.
 */
class m170930_013643_create_role_table extends Migration
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

        $this->createTable('{{%role}}', [

            'id' => $this->primaryKey(),

            'sort_id'     => $this->integer(8)->notNull()->comment('排序'),
            'rkey'        => $this->string(55)->notNull()->unique()->comment('角色关键KEY'),
            'name'        => $this->string(55)->notNull()->unique()->comment('角色名称'),
            'exp'         => $this->integer(11)->null()->defaultValue(10),
            'description' => $this->text()->null(),
            'ico_class'   => $this->string(55),
            'is_using'    => $this->string()->notNull()->defaultValue('On'),
            'published'   => $this->dateTime()->notNull(),
        ], $tableOptions);

        // creates index for column `author_id`
        $this->createIndex('idx-role-rkey', '{{%role}}', 'rkey');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%role}}');
    }
}
