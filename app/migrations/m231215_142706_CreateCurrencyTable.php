<?php

use yii\db\Migration;

/**
 * Handles the creation of table `currency`.
 */
class m231215_142706_CreateCurrencyTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('currency', [
            'id' => $this->primaryKey(),
            'code' => $this->char(3)->unique()->notNull(),
            'nominal' => $this->smallInteger()->notNull(),
            'name' => $this->string(100)->notNull(),
            'value' => $this->float()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('currency');
    }
}
