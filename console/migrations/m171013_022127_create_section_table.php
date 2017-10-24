<?php

use yii\db\Migration;

/**
 * Handles the creation of table `section`. 版块
 */
class m171013_022127_create_section_table extends Migration
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

        $this->createTable('section', [

            'id' => $this->primaryKey(),

            's_key'        => $this->string(55)->notNull()->unique()->comment('版块关键KEY'),
            'sort_id'     => $this->integer()->notNull()->unique(),
            'name'        => $this->string(85)->notNull()->unique(),
            'description' => $this->text(),
            'keywords'    => $this->string(125),
            'ico_class'   => $this->string(55),
            'parent_key'  => $this->string(55),
            'is_ad'       => $this->string(10)->defaultValue('On'),
            'is_post'     => $this->string(10)->defaultValue('On'),
            'is_using'    => $this->string(10)->defaultValue('On'),
            'published'   => $this->dateTime()->null(),
        ], $tableOptions);

        // creates index for column `author_id`
        $this->createIndex('idx-menu-s_key', '{{%section}}', 's_key');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('section');
    }
}
