<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $table = 'brands';        // Table name
    protected $primaryKey = 'b_id';        // Primary key
    protected $allowedFields = ['b_name', 'b_desc', 'b_desc','b_status']; // Fillable columns
}
