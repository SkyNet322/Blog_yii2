<?php

use yii\db\Migration;

/**
 * Class m190702_091146_add_table_subscriptions_and_foreginkey
 */
class m190702_091146_add_table_subscriptions_and_foreginkey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subscriptions',
            [
               'user_id' => $this->integer(),
               'subscription_id' => $this->integer()
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('subscription');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190702_091146_add_table_subscriptions_and_foreginkey cannot be reverted.\n";

        return false;
    }
    */
}
