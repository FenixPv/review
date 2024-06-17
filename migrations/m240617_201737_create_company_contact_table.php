<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%company_contact}}`.
 */
class m240617_201737_create_company_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%company_contact}}', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer()->notNull(),
            'type' => $this->string(25)->notNull(),
            'data' => $this->string(25),
            'FOREIGN KEY(company_id) REFERENCES company(id) ON DELETE CASCADE',
        ]);

        $this->createIndex(
            'idx-company_contact',
            'company_contact',
            'id'
        );

        $this->createIndex(
            'idx-company_id',
            'company_contact',
            'company_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%company_contact}}');
    }
}
