<?php

use yii\db\Migration;

/**
 * Class m190627_133504_createTable_tag
 */
class m190627_133504_createTable_tag extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tags',
            [
                'id' => $this->primaryKey(),
                'tag' => $this->string()
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('tags');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190627_133504_createTable_tag cannot be reverted.\n";

        return false;
    }
    */
}
