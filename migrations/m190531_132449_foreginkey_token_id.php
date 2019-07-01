<?php

use yii\db\Migration;

/**
 * Class m190531_132449_foreginkey_token_id
 */
class m190531_132449_foreginkey_token_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('token_user_id','token','user_id','users','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('token_user_id','token');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190531_132449_foreginkey_token_id cannot be reverted.\n";

        return false;
    }
    */
}
