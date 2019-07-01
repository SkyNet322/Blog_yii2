<?php

use yii\db\Migration;

/**
 * Class m190531_082421_column_access_token
 */
class m190531_082421_column_access_token extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'access_token', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'access_token');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190531_082421_column_access_token cannot be reverted.\n";

        return false;
    }
    */
}
