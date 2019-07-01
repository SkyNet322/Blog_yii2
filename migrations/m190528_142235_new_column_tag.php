<?php

use yii\db\Migration;

/**
 * Class m190528_142235_new_column_tag
 */
class m190528_142235_new_column_tag extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('posts', 'tag', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('posts', 'tag');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190528_142235_new_column_tag cannot be reverted.\n";

        return false;
    }
    */
}
