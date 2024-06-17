<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%company}}`.
 */
class m240617_194635_create_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%company}}', [
            'id'          => $this->primaryKey(),
            'category_id' => $this->integer(),
            'created_at'  => $this->integer()->notNull(),
            'updated_at'  => $this->integer()->notNull(),
            'name'        => $this->string(),
            'description' => $this->text(),
            'is_verified' => $this->smallInteger()->notNull()->defaultValue(0),
            'FOREIGN KEY(category_id) REFERENCES category_company(id) ON DELETE CASCADE',
        ]);
        $this->createIndex(
            'idx-company',
            'company',
            'id'
        );
        $this->createIndex(
            'idx-category_id',
            'company',
            'category_id'
        );
        $this->createIndex(
            'idx-category',
            'category_company',
            'id'
        );

//        $this->addForeignKey(
//            'fk-company-category_id',
//            'company',
//            'category_id',
//            'category_company',
//            'id',
//            'CASCADE'
//        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%company}}');
    }
}
