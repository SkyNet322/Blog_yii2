<?php

use yii\db\Migration;

/**
 * Class m190701_083311_fotrginkey_like_post_user
 */
class m190701_083311_fotrginkey_like_post_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('post_id_like', 'like', 'post_id', 'posts', 'id');
        $this->addForeignKey('user_id_like', 'like', 'user_id', 'users', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('post_id_like', 'like');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190701_083311_fotrginkey_like_post_user cannot be reverted.\n";

        return false;
    }
    */
}
