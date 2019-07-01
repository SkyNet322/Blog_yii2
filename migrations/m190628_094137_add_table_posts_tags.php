<?php

use yii\db\Migration;

/**
 * Class m190628_094137_add_table_posts_tags
 */
class m190628_094137_add_table_posts_tags extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tags_posts',
            [
                'tag_id' => $this->integer(),
                'post_id' => $this->integer()
            ]);

        $this->addForeignKey('posts_tags_id', 'tags_posts', 'post_id', 'posts', 'id');

        $this->addForeignKey('tags_posts_id','tags_posts','tag_id', 'tags','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('tags_posts');

       $this->dropForeignKey('posts_tags_id', 'posts');

       $this->dropForeignKey('tags_posts_id', 'tags');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190628_094137_add_table_posts_tags cannot be reverted.\n";

        return false;
    }
    */
}
