<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m240617_202504_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%comment}}', [
            'id'         => $this->primaryKey(),
            'user_id'    => $this->integer()->notNull(),
            'company_id' => $this->integer()->notNull(),
            'star'       => $this->integer()->notNull(),
            'body'       => $this->text(),
            'FOREIGN KEY(user_id) REFERENCES user(id) ON DELETE CASCADE',
            'FOREIGN KEY(company_id) REFERENCES company(id) ON DELETE CASCADE',
        ]);

        $this->createIndex(
            'idx-comment',
            'comment',
            'id'
        );
        $this->createIndex(
            'idx-user',
            'user',
            'id'
        );
        $this->createIndex(
            'idx-user_id',
            'comment',
            'user_id'
        );
        $this->createIndex(
            'idx-comment_company_id',
            'comment',
            'company_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%comment}}');
    }
}
