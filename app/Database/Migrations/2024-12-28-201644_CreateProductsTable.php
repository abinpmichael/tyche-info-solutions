<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'      => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            's_desc' => [
                'type' => 'TEXT',
            ],
            'type' => [
                'type'       => 'TINYINT', // A flag to indicate product type
                'constraint' => 1,
                'default'    => 1, // Default value
            ],
            'processor' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'screen_size' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'storage' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'memory' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'warranty' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'graphics' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'thumbnail' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'default' => 'CURRENT_TIMESTAMP',
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'default' => 'CURRENT_TIMESTAMP',
            ],
            'status' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1, // Default value is 1 (active)
            ],
            'graphics_d' => [
                'type' => 'TEXT',
            ],
            'display_d' => [
                'type' => 'TEXT',
            ],
            'audio_d' => [
                'type' => 'TEXT',
            ],
            'dimensions_d' => [
                'type' => 'TEXT',
            ],
            'ports_d' => [
                'type' => 'TEXT',
            ],
            'about' => [
                'type' => 'TEXT',
            ],
            'meta_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'meta_desc' => [
                'type' => 'TEXT',
            ],
        ]);

        $this->forge->addPrimaryKey('id'); // Set primary key
        $this->forge->createTable('products'); // Create the table
    }

    public function down()
    {
        // Drop 'products' table
        $this->forge->dropTable('products');
    }
}
