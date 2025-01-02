<?php
namespace App\Models;

use CodeIgniter\Model;

class AboutModel extends Model
{
    protected $table = 'about';
    protected $primaryKey = 'id';
    protected $allowedFields = ['about', 'img', 'our_mission', 'our_vision', 'our_values'];
}
