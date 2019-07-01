<?php

use yii\db\Migration;

/**
 * Class m190528_140254_posts
 */
class m190528_140254_posts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'posts',
            [
                'id' => $this->primaryKey(),
                'author' =>$this->string()->notNull(),
                'title' => $this->string()->notNull(),
                'content' => $this->text()->notNull(),
                'data_create' => $this->timestamp()->defaultExpression('now()')
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('posts');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190528_140254_posts cannot be reverted.\n";

        return false;
    }
    */
}
