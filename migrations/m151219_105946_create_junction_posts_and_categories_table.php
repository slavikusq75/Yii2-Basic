<?php

use yii\db\Schema;
use yii\db\Migration;

class m151219_105946_create_junction_posts_and_categories_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('posts_categories', [
            'post_id' => $this->integer(),
            'category_id' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey('FK_posts_category', 'posts_categories', 'post_id', 'posts', 'id');
        $this->addForeignKey('FK_category_posts', 'posts_categories', 'category_id', 'categories', 'id');
    }

    public function down()
    {
        $this->dropTable('posts_categories');
    }
}
