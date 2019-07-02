<?php

use yii\db\Migration;

/**
 * Class m190702_093731_add_foreginkey_subscription_user
 */
class m190702_093731_add_foreginkey_subscription_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('subscription_user', 'subscriptions', 'user_id', 'users','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('subscription_user', 'subscriptions');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190702_093731_add_foreginkey_subscription_user cannot be reverted.\n";

        return false;
    }
    */
}
