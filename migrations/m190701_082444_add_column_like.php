<?php

use yii\db\Migration;

/**
 * Class m190701_082444_add_column_like
 */
class m190701_082444_add_column_like extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('like',
            [
                'post_id' => $this->integer(),
                'user_id' => $this->integer()
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('like');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190701_082444_add_column_like cannot be reverted.\n";

        return false;
    }
    */
}
