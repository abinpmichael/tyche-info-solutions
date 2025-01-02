<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table = 'home'; // Replace with your actual table name
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'welcome_note',
        'w_img',
        'r_link',
        'why',
        'why_tags',
        'we_serve',
        'we_tag',
        'meta_tite',
        'meta_desc',
        'header_script',
        'footer_script',
        'last_edited',
    ];
}
