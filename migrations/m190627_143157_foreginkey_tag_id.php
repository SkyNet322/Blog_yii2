<?php

use yii\db\Migration;

/**
 * Class m190627_143157_foreginkey_tag_id
 */
class m190627_143157_foreginkey_tag_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->addForeignKey('tag_post_id', 'posts', 'tag_id', 'tags', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('tag_post_id', 'posts');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190627_143157_foreginkey_tag_id cannot be reverted.\n";

        return false;
    }
    */
}
