<?php

use yii\db\Migration;

/**
 * Handles the creation of table `menu`.
 */
class m170930_073709_create_menu_table extends Migration
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

        $this->createTable('{{%menu}}', [

            'id' => $this->primaryKey(),

            'm_key'     => $this->string(85)->notNull()->unique(),
            'sort_id'   => $this->integer(11)->notNull(),
            'name'      => $this->string(55)->notNull()->unique(),
            'parent_id' => $this->string(55)->notNull()->comment('父类菜单KEY'),
            'title'     => $this->string(85)->notNull()->unique(),
            'ico_class' => $this->string(85)->null(),
            'url'       => $this->string(125)->notNull()->unique(),
            'is_using'  => $this->string(25)->notNull(),
            'published' => $this->dateTime(),
        ], $tableOptions);

        // creates index for column `author_id`
        $this->createIndex('idx-menu-m_key', '{{%menu}}', 'm_key');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%menu}}');
    }
}
