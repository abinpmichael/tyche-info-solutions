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
        'enquiry_email',
        'contact_email',
        'last_edited',
        'welcome_title',
        'welcome_title_tag',
        'welcome_subtitle',
        'welcome_subtitle_tag',
        'products_title',
        'products_title_tag',
        'products_subtitle',
        'products_subtitle_tag',
        'why_title',
        'why_title_tag',
        'why_subtitle',
        'why_subtitle_tag',
        'brands_title',
        'brands_title_tag',
        'brands_subtitle',
        'brands_subtitle_tag',
    ];
}
