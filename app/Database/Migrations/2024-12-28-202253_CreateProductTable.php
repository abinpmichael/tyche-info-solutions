<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductTable extends Migration
{
    public function up()
    {
        // Create 'product' table
        $this->forge->addField([
            'p_id' => [
                'type'           => 'INT',
                'unsigned'      => true,
                'auto_increment' => true,
            ],
            'p_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'p_desc' => [
                'type'       => 'TEXT',
            ],
            'p_status' => [
                'type'       => 'TINYINT',
                'constraint' => '1',
                'default'    => 1,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);

        $this->forge->addPrimaryKey('p_id'); // Set primary key
        $this->forge->createTable('product'); // Create the table
    }

    public function down()
    {
        // Drop 'product' table
        $this->forge->dropTable('product');
    }
}
