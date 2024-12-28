<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run()
    {
       $data = [
            [
                'b_name'    => 'HP',
                'b_desc'    => 'HP',
                'b_status'  => 1, // Active
                'created_at'=> '2024-12-26 14:12:23',
            ],
            [
                'b_name'    => 'Lenovo',
                'b_desc'    => 'Lenovo',
                'b_status'  => 1, // Active
                'created_at'=> '2024-12-26 14:12:33',
            ],
        ];

        // Insert data into 'brands' table
        $this->db->table('brands')->insertBatch($data);
    }
}
