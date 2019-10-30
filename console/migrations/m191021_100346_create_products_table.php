<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m191021_100346_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'image' => $this->string(),
            'price' => $this->integer()->notNull()->defaultValue(0),
            'category_id' => $this->integer()->notNull(),
            'sale' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ]);

        // $this->addForeignKey(
        //     'fk-product-category_id',
        //     'products',
        //     'category_id',
        //     'categories',
        //     'id',
        //     'CASCADE'
        // );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
