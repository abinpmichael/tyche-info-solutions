<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $table      = 'slider';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'b_heading',
        's_heading',
        'button_name',
        'b_link',
        'img',
        'created_at'
    ];
}
