<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'p_id';
    protected $allowedFields = ['p_name', 'p_desc', 'p_status', 'created_at'];
    protected $useTimestamps = false;
}
