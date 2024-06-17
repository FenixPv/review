<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_company}}`.
 */
class m240617_172906_create_category_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%category_company}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%category_company}}');
    }
}
