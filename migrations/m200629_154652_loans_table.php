<?php

use yii\db\Migration;

/**
 * Class m200629_154652_loans_table
 */
class m200629_154652_loans_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('loans', [
            'id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
            'amount' => $this->float()->notNull(),
            'term' => $this->integer()->notNull(),
            'annual_rate' => $this->float()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200629_154652_loans_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200629_154652_loans_table cannot be reverted.\n";

        return false;
    }
    */
}
