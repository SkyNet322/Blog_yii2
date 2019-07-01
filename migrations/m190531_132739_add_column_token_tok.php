<?php

use yii\db\Migration;

/**
 * Class m190531_132739_add_column_token_tok
 */
class m190531_132739_add_column_token_tok extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('token','token', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('token','token');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190531_132739_add_column_token_tok cannot be reverted.\n";

        return false;
    }
    */
}
