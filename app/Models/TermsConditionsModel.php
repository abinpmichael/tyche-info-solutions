<?php

namespace App\Models;

use CodeIgniter\Model;

class TermsConditionsModel extends Model
{
    protected $table = 'terms_conditions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'intro', 
        'rental_terms', 
        'refurbished_terms', 
        'payments_charges', 
        'delivery_collection', 
        'limitation_liability', 
        'privacy_terms', 
        'contact_email', 
        'contact_phone1', 
        'contact_phone2'
    ];
}
