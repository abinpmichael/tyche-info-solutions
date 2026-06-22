<?php

namespace App\Models;

use CodeIgniter\Model;

class PrivacyPolicyModel extends Model
{
    protected $table = 'privacy_policy';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'intro_title',
        'intro_text',
        'info_collect',
        'info_use',
        'info_share',
        'data_security',
        'cookies_tracking',
        'user_rights',
        'retention_data',
        'third_party_links',
        'policy_changes',
        'privacy_title',
        'privacy_title_tag',
        'privacy_subtitle',
        'privacy_subtitle_tag',
        'collect_title',
        'use_title',
        'share_title',
        'security_title',
        'cookies_title',
        'rights_title',
        'retention_title',
        'third_party_title',
        'changes_title'
    ];
}
