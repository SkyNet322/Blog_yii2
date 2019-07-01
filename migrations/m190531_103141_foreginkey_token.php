<?php

use yii\db\Migration;

/**
 * Class m190531_103141_foreginkey_token
 */
class m190531_103141_foreginkey_token extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('user_token_id', 'users', 'token_id', 'token', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'user_token_id',
            'users'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190531_103141_foreginkey_token cannot be reverted.\n";

        return false;
    }
    */
}
