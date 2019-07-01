<?php

use yii\db\Migration;

/**
 * Class m190628_094025_drop_foreginkey_tag_id
 */
class m190628_094025_drop_foreginkey_tag_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('tag_post_id', 'posts');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addForeignKey('tag_post_id', 'posts', 'tag_id', 'tags', 'id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190628_094025_drop_foreginkey_tag_id cannot be reverted.\n";

        return false;
    }
    */
}
