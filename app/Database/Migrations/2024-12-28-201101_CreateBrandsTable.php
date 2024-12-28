<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBrandsTable extends Migration
{
    public function up()
    {
              // Create 'brands' table
        $this->forge->addField([
            'b_id' => [
                'type'           => 'INT',
                'unsigned'      => true,
                'auto_increment' => true,
            ],
            'b_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'b_desc' => [
                'type'       => 'TEXT', // 'TEXT' type for longer descriptions
            ],
            'b_status' => [
                'type'       => 'TINYINT', // 1 or 0 for active/inactive status
                'constraint' => 1,
                'default'    => 1, // Default value is 1 (active)
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'default' => 'CURRENT_TIMESTAMP', // Set current timestamp by default
            ],
        ]);
        $this->forge->addPrimaryKey('b_id'); // Set primary key
        $this->forge->createTable('brands'); // Create the table
    }

    public function down()
    {
         $this->forge->dropTable('brands');
    }
}
