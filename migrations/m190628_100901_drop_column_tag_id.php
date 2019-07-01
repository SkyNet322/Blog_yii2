<?php

use yii\db\Migration;

/**
 * Class m190628_100901_drop_column_tag_id
 */
class m190628_100901_drop_column_tag_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('posts', 'tag_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('posts', 'tag_id', $this->integer());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190628_100901_drop_column_tag_id cannot be reverted.\n";

        return false;
    }
    */
}
