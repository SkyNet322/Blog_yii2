<?php

use yii\db\Migration;

/**
 * Class m190531_102539_Token_table
 */
class m190531_102539_Token_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'token',
            [
                'id' => $this->primaryKey(),
                'access_token' => $this->string()->notNull(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('token');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190531_102539_Token_table cannot be reverted.\n";

        return false;
    }
    */
}
