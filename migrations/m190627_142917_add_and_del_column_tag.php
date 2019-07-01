<?php

use yii\db\Migration;

/**
 * Class m190627_142917_add_and_del_column_tag
 */
class m190627_142917_add_and_del_column_tag extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->dropColumn('posts', 'tag');
            $this->addColumn('posts', 'tag_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('posts', 'tag', $this->string());
        $this->dropColumn('posts', 'tag_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190627_142917_add_and_del_column_tag cannot be reverted.\n";

        return false;
    }
    */
}
