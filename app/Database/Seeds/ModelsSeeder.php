<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ModelsSeeder extends Seeder
{
    public function run()
    {
        // Data to insert
        $data = [
            [
                'name'       => 'Dell Latitude 3540',
                's_desc'     => '(16 GB / HDMI 2 Nos / USB 2 Nos / Lan / C Port)',
                'type'       => 1,
                'processor'  => 'Core i5-1235U',
                'screen_size'=> '15.6',
                'storage'    => '512 SSD',
                'memory'     => '16 GB',
                'warranty'   => '1 Year',
                'graphics'   => 'Integrated',
                'thumbnail'  => '1735275492_69e5a9ca43003815f042.jpg',
                'created_at' => '2024-12-26 20:58:00',
                'updated_at' => '2024-12-27 22:34:08',
                'status'     => 1,
                'graphics_d' => 'AMD Radeon Pro 5300M with 4GB of GDDR6 memory and ...',
                'display_d'  => 'Retina display 16‑inch (diagonal) LED‑backlit disp...',
                'audio_d'    => 'High‑fidelity six‑speaker system with force‑cancel...',
                'dimensions_d'=> 'Height: 0.64 inch (1.62 cm), Width: 14.09 inches (...',
                'ports_d'    => 'Four Thunderbolt 3 (USB-C) ports with support for:...',
                'about'      => '<p>&nbsp;</p><h3 class="font-size-18 font-weight...',
                'meta_title' => 'Dell Latitude 3540 - Laptop',
                'meta_desc'  => 'Dell Latitude 3540 with Core i5 processor...',
            ],
            [
                'name'       => 'Asus Rog',
                's_desc'     => '(16 GB / HDMI 2 Nos / USB 2 Nos / Lan / C Port)',
                'type'       => 1,
                'processor'  => 'i7 9750H',
                'screen_size'=> '15.6"',
                'storage'    => '1TB SSD',
                'memory'     => '16 GB',
                'warranty'   => '1 Year',
                'graphics'   => 'Nvidia GTX RTX 2060 6GB',
                'thumbnail'  => '1735365115_b213c95b24cefc6de985.jpg',
                'created_at' => '2024-12-26 20:58:03',
                'updated_at' => '2024-12-27 22:51:55',
                'status'     => 1,
                'graphics_d' => 'Nvidia GTX RTX 2060 6GB...',
                'display_d'  => 'Retina display...',
                'audio_d'    => 'High‑fidelity audio...',
                'dimensions_d'=> 'Height: 0.64 inch...',
                'ports_d'    => 'USB-C support...',
                'about'      => 'Details about the Asus Rog...',
                'meta_title' => 'Asus Rog Laptop',
                'meta_desc'  => 'Asus Rog with i7 processor...',
            ],
            [
                'name'       => 'Lenovo V15',
                's_desc'     => '(8 GB / HDMI 2 Nos / USB 2 Nos / Lan / C Port)',
                'type'       => 1,
                'processor'  => 'Intel i3 12th Gen',
                'screen_size'=> '15.6"',
                'storage'    => '512 SSD',
                'memory'     => '8 GB',
                'warranty'   => '1 Year',
                'graphics'   => 'Integrated',
                'thumbnail'  => '1735367504_044d54e8f3446067b0ab.jpg',
                'created_at' => '2024-12-27 23:31:44',
                'updated_at' => '2024-12-27 23:31:44',
                'status'     => 1,
                'graphics_d' => 'Integrated Graphics...',
                'display_d'  => 'Full HD LED display...',
                'audio_d'    => 'Stereo speakers...',
                'dimensions_d'=> 'Dimensions of Lenovo V15...',
                'ports_d'    => 'USB 3.0, HDMI, Ethernet...',
                'about'      => 'About Lenovo V15...',
                'meta_title' => 'Lenovo V15 - Laptop',
                'meta_desc'  => 'Lenovo V15 with Intel i3 processor...',
            ]
        ];

        // Insert data into 'products' table
        $this->db->table('products')->insertBatch($data);
    }
}
