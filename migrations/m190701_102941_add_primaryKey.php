<?php

use yii\db\Migration;

/**
 * Class m190701_102941_add_primaryKey
 */
class m190701_102941_add_primaryKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('like', 'id', $this->primaryKey());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('like', 'id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190701_102941_add_primaryKey cannot be reverted.\n";

        return false;
    }
    */
}
