<?php

use yii\db\Migration;

/**
 * Class m190531_102805_add_column_token_id
 */
class m190531_102805_add_column_token_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'token_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'token_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190531_102805_add_column_token_id cannot be reverted.\n";

        return false;
    }
    */
}
