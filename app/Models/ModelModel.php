<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelModel extends Model
{
    protected $table      = 'models';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','s_desc', 'type', 'processor', 'screen_size', 'storage', 'memory','warranty', 'graphics', 'thumbnail','status','graphics_d','display_d','audio_d','dimensions_d','ports_d','about','meta_title','meta_desc','b_id'];
}
