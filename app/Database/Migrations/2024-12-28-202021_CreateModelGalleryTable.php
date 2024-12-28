<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateModelGalleryTable extends Migration
{
    public function up()
    {
        // Create 'model_gallery' table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'      => true,
                'auto_increment' => true,
            ],
            'model_id' => [
                'type'       => 'INT',
                'unsigned'  => true,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);

        $this->forge->addPrimaryKey('id'); // Set primary key
        $this->forge->addForeignKey('model_id', 'products', 'id', 'CASCADE', 'CASCADE'); // Foreign key constraint
        $this->forge->createTable('model_gallery'); // Create the table
    }

    public function down()
    {
        // Drop 'model_gallery' table
        $this->forge->dropTable('model_gallery');
    }
}
