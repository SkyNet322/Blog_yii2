<?php

use yii\db\Migration;

/**
 * Class m190702_101932_add_primaly_key
 */
class m190702_101932_add_primaly_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('subscriptions', 'id_sub', $this->primaryKey());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('subscriptions', 'id_sub');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190702_101932_add_primaly_key cannot be reverted.\n";

        return false;
    }
    */
}
