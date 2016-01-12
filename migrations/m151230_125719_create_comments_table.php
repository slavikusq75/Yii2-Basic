<?php

use yii\db\Schema;
use yii\db\Migration;

class m151230_125719_create_comments_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'userblog_id' => $this->integer(),
            'post_id' => $this->integer(),
            'comment' => $this->text()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('FK_comment_post', 'comments', 'post_id', 'posts', 'id');
        $this->addForeignKey('FK_comment_userblog', 'comments', 'userblog_id', 'userblog', 'id');
    }

    public function down()
    {
        $this->dropTable('comments');
    }
}
