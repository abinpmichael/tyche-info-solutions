<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'b_id';
    protected $allowedFields = ['b_name', 'b_desc', 'b_status','img','created_at'];
    protected $useTimestamps = false;
}
