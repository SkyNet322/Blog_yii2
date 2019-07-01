<?php

use yii\db\Migration;

/**
 * Class m190531_084149_column_user_id
 */
class m190531_084149_column_user_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('posts', 'user_id', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('posts', 'user_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190531_084149_column_user_id cannot be reverted.\n";

        return false;
    }
    */
}
