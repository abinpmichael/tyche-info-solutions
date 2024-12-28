<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ModelGallerySeeder extends Seeder
{
    public function run()
    {
        // Data to insert
        $data = [
            ['model_id' => 1, 'image' => '1735275492_d565d2eacd96f46997de.jpg', 'created_at' => '2024-12-26 21:58:12'],
            ['model_id' => 1, 'image' => '1735275492_261597f75876c2796ff7.jpg', 'created_at' => '2024-12-26 21:58:12'],
            ['model_id' => 1, 'image' => '1735275492_7581c2e5a8cffd643a7e.jpg', 'created_at' => '2024-12-26 21:58:12'],
            ['model_id' => 1, 'image' => '1735275492_4fbf48410131f36ad7be.jpg', 'created_at' => '2024-12-26 21:58:12'],
            ['model_id' => 1, 'image' => '1735275492_5725073df5490fef589d.jpg', 'created_at' => '2024-12-26 21:58:12'],
            ['model_id' => 2, 'image' => '1735365115_90f41f6bd8fc18865ef7.jpg', 'created_at' => '2024-12-27 22:51:55'],
            ['model_id' => 2, 'image' => '1735365115_e7d3746a569dd77edbd0.jpg', 'created_at' => '2024-12-27 22:51:55'],
            ['model_id' => 2, 'image' => '1735365115_1bc29b8ed1a485bb317c.jpg', 'created_at' => '2024-12-27 22:51:55'],
            ['model_id' => 2, 'image' => '1735365115_280965ae516c01f4b3cc.jpg', 'created_at' => '2024-12-27 22:51:55'],
            ['model_id' => 2, 'image' => '1735365115_8e40eb374d8736cbcbdd.jpg', 'created_at' => '2024-12-27 22:51:55'],
            ['model_id' => 3, 'image' => '1735367504_ee55a9a07b908e8656aa.jpg', 'created_at' => '2024-12-27 23:31:44'],
            ['model_id' => 3, 'image' => '1735367504_ced62bc7d7cb2770eed3.jpg', 'created_at' => '2024-12-27 23:31:44'],
            ['model_id' => 3, 'image' => '1735367504_532e4cbf12012e6dd593.jpg', 'created_at' => '2024-12-27 23:31:44'],
            ['model_id' => 3, 'image' => '1735367504_6c0993dfd2da6271feb7.jpg', 'created_at' => '2024-12-27 23:31:44'],
            ['model_id' => 3, 'image' => '1735367504_ff24b2843bec4968a03c.jpg', 'created_at' => '2024-12-27 23:31:44'],
        ];

        // Insert data into 'model_gallery' table
        $this->db->table('model_gallery')->insertBatch($data);
    }
}
