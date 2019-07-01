<?php

use yii\db\Migration;

/**
 * Class m190627_092525_delite_colums_tb_user_and_token
 */
class m190627_092525_delite_colums_tb_user_and_token extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->dropColumn('users', 'access_token');
            $this->dropColumn('users', 'token_id');
            $this->dropColumn('token', 'token');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('users', 'access_token', $this->string());
        $this->addColumn('users', 'token_id', $this->integer());
        $this->addColumn('token','token', $this->string());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190627_092525_delite_colums_tb_user_and_token cannot be reverted.\n";

        return false;
    }
    */
}
