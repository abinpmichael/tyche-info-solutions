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
        'refund_title',
        'refund_title_tag',
        'refund_subtitle',
        'refund_subtitle_tag',
        'cancellation_title',
        'cancellation_rentals_title',
        'cancellation_refurbished_title',
        'refund_title_sec',
        'refund_rentals_title',
        'refund_refurbished_title',
        'return_exchange_title',
        'exceptions_title',
        'process_title',
        'late_missing_title',
        'changes_policy_title'
    ];
}
