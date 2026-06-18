<?php

namespace App\Models;

use CodeIgniter\Model;

class RefundPolicyModel extends Model
{
    protected $table      = 'refund_policy';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'cancellation_rentals',
        'cancellation_refurbished',
        'refund_rentals',
        'refund_refurbished',
        'return_exchange',
        'exceptions',
        'process',
        'late_missing',
        'changes_policy',
    ];
}
