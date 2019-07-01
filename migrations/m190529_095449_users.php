<?php

use yii\db\Migration;

/**
 * Class m190529_095449_users
 */
class m190529_095449_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'users',
            [
                'id' => $this->primaryKey(),
                'login' =>$this->string()->notNull(),
                'pass' => $this->string()->notNull(),
                'nickname' => $this->string()->notNull(),
                'email' => $this->string()->notNull(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190529_095449_users cannot be reverted.\n";

        return false;
    }
    */
}
