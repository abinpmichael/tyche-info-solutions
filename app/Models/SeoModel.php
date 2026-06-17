<?php

namespace App\Models;

use CodeIgniter\Model;

class SeoModel extends Model
{
    protected $table      = 'seo_settings';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'page_route',
        'page_name',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'schema_code',
        'header_code',
        'body_code',
        'footer_code',
        'updated_at'
    ];
}
