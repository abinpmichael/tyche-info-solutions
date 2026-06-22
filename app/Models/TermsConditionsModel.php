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
        'contact_phone2',
        'terms_title',
        'terms_title_tag',
        'terms_subtitle',
        'terms_subtitle_tag',
        'rental_title',
        'refurbished_title',
        'payments_title',
        'delivery_title',
        'liability_title',
        'privacy_title_sec'
    ];
}
