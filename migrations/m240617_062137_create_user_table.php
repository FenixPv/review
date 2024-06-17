<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m240617_062137_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%user}}', [
            'id'                   => $this->primaryKey(),
            'created_at'           => $this->integer()->notNull(),
            'updated_at'           => $this->integer()->notNull(),
            'username'             => $this->string()->notNull(),
            'auth_key'             => $this->string(32),
            'email_confirm_token'  => $this->string(),
            'password_hash'        => $this->string()->notNull(),
            'password_reset_token' => $this->string(),
            'email'                => $this->string()->notNull(),
            'status'               => $this->smallInteger()->notNull()->defaultValue(0),
            'avatar'               => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%user}}');
    }
}
