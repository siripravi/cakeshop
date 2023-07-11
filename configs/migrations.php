<?php

use yii\db\Migration;

class m170515_115236_basetables extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%coc_group}}', [
            'id' => $this->primaryKey(),
            'parent_group_id' => $this->integer()->defaultValue(0),
            'cover_image_id' => $this->integer(),
            'images_list' => $this->text(),
            'name' => $this->text()->notNull(), // Textiles
            'teaser' => $this->text(),
            'text' => $this->text(),
        ]);
        
        $this->createTable('{{%coc_product_group_ref}}', [
            'group_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
        ]);
        
        $this->addPrimaryKey('coc_product_group_pk', '{{%coc_product_group_ref}}', ['group_id', 'product_id']);
        
        $this->createTable('{{%coc_product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(), // Unicorm Trousers
            'producer_id' => $this->integer()->notNull(),
        ]);
        
        $this->createTable('{{%coc_set}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(), // Trousers
        ]);
        
        $this->createTable('{{%coc_product_set_ref}}', [
            'product_id' => $this->integer()->notNull(),
            'set_id' => $this->integer()->notNull(),
        ]);
        
        $this->addPrimaryKey('coc_product_set_ref_pk', '{{%coc_product_set_ref}}', ['product_id', 'set_id']);
        
        $this->createTable('{{%coc_set_attribute}}', [
            'id' => $this->primaryKey(),
            'type' => $this->integer(), // 1 = integer, 2 = boolean, 3 = string
            'input' => $this->string()->notNull(), // zaa-text, zaa-password
            'name' => $this->string()->notNull(), // Size, Color, Material Type (Jeans), Width, Height
            'values' => $this->text(), // If its a select dropdown the json can be stored in `values` field. Optiosn for zaa-text
            'is_i18n' => $this->boolean()->defaultValue(false),
        ]);
        
        $this->createTable('{{%coc_set_attribute_ref}}', [
            'set_id' => $this->integer()->notNull(),
            'attribute_id' => $this->integer()->notNull(),
        ]);
        
        $this->addPrimaryKey('coc_set_attribute_ref_pk', '{{%coc_set_attribute_ref}}', ['set_id', 'attribute_id']);
        
        $this->createTable('{{%coc_article}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'name' => $this->text()->notNull(), // Unicorn Trousers Red XXL with Jeans Material
            'sku' => $this->string(),
            'qty_available' => $this->integer(),
        ]);
        
        $this->createTable('{{%coc_article_attribute_value}}', [
            'article_id' => $this->integer()->notNull(),
            'set_id' => $this->integer()->notNull(),
            'attribute_id' => $this->integer()->notNull(),
            'value' => $this->text(),
        ]);
        
        $this->addPrimaryKey('coc_article_attribute_value_pk', '{{%coc_article_attribute_value}}', ['article_id', 'attribute_id', 'set_id']);
        
        $this->createTable('{{%coc_article_price}}', [
            'article_id' => $this->integer()->notNull(),
            'currency_id' => $this->integer()->notNull(),
            'qty' => $this->integer()->notNull(), // 0 = which means this price counts independent about how many items u have in your basket | 10 = When you hvae 10 or more items in your basket, this price is used to calculate for each item.
            'price' => $this->float(2)->notNull(),
        ]);
        
        $this->addPrimaryKey('coc_article_price_pk', '{{%coc_article_price}}', ['article_id', 'currency_id', 'qty']);
        
        $this->createTable('{{%coc_currency}}', [
            'id' => $this->primaryKey(),
            'is_base' => $this->boolean()->defaultValue(false),
            'name' => $this->string()->notNull(), // CHF, EUR
            'value' => $this->float(2)->notNull(), // 1.00 CHF (which could be the base value) therefore EUR would be 0.90
        ]);
        
        $this->createTable('{{%coc_producer}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%coc_group}}');
        $this->dropTable('{{%coc_product_group_ref}}');
        $this->dropTable('{{%coc_product}}');
        $this->dropTable('{{%coc_product_set_ref}}');
        $this->dropTable('{{%coc_set}}');
        $this->dropTable('{{%coc_set_attribute}}');
        $this->dropTable('{{%coc_set_attribute_ref}}');
        $this->dropTable('{{%coc_article}}');
        $this->dropTable('{{%coc_article_attribute_value}}');
        $this->dropTable('{{%coc_article_price}}');
        $this->dropTable('{{%coc_currency}}');
        $this->dropTable('{{%coc_producer}}');
    }
}