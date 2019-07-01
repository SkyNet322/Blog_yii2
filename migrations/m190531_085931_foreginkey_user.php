<?php

use yii\db\Migration;

/**
 * Class m190531_085931_foreginkey_user
 */
class m190531_085931_foreginkey_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('post_user_id', 'posts', 'user_id', 'users', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'post_user_id',
            'posts'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190531_085931_foreginkey_user cannot be reverted.\n";

        return false;
    }
    */
}
