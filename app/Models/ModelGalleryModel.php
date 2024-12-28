<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelGalleryModel extends Model
{
    protected $table      = 'model_gallery';
    protected $primaryKey = 'id';
    protected $allowedFields = ['model_id', 'image'];
}
