<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PrivacyPolicyModel;

class PrivacyController extends BaseController
{
    public function index()
    {
        $model = new PrivacyPolicyModel();
        $record = $model->find(1);

        if (!$record) {
            return redirect()->back()->with('error', 'Record not found');
        }

        echo view('Admin/header');
        echo view('Admin/privacy/index', ['record' => $record]);
        echo view('Admin/footer');
    }

    public function update($id)
    {
        $model = new PrivacyPolicyModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'intro_title' => 'permit_empty',
            'intro_text' => 'required',
            'info_collect' => 'required',
            'info_use' => 'required',
            'info_share' => 'required',
            'data_security' => 'required',
            'cookies_tracking' => 'required',
            'user_rights' => 'required',
            'retention_data' => 'required',
            'third_party_links' => 'required',
            'policy_changes' => 'required',
            'privacy_title' => 'permit_empty',
            'privacy_title_tag' => 'permit_empty',
            'privacy_subtitle' => 'permit_empty',
            'privacy_subtitle_tag' => 'permit_empty',
            'collect_title' => 'permit_empty',
            'use_title' => 'permit_empty',
            'share_title' => 'permit_empty',
            'security_title' => 'permit_empty',
            'cookies_title' => 'permit_empty',
            'rights_title' => 'permit_empty',
            'retention_title' => 'permit_empty',
            'third_party_title' => 'permit_empty',
            'changes_title' => 'permit_empty',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'intro_title' => $this->request->getPost('privacy_subtitle'),
            'intro_text' => $this->request->getPost('intro_text'),
            'info_collect' => $this->request->getPost('info_collect'),
            'info_use' => $this->request->getPost('info_use'),
            'info_share' => $this->request->getPost('info_share'),
            'data_security' => $this->request->getPost('data_security'),
            'cookies_tracking' => $this->request->getPost('cookies_tracking'),
            'user_rights' => $this->request->getPost('user_rights'),
            'retention_data' => $this->request->getPost('retention_data'),
            'third_party_links' => $this->request->getPost('third_party_links'),
            'policy_changes' => $this->request->getPost('policy_changes'),
            'privacy_title' => $this->request->getPost('privacy_title'),
            'privacy_title_tag' => $this->request->getPost('privacy_title_tag'),
            'privacy_subtitle' => $this->request->getPost('privacy_subtitle'),
            'privacy_subtitle_tag' => $this->request->getPost('privacy_subtitle_tag'),
            'collect_title' => $this->request->getPost('collect_title'),
            'use_title' => $this->request->getPost('use_title'),
            'share_title' => $this->request->getPost('share_title'),
            'security_title' => $this->request->getPost('security_title'),
            'cookies_title' => $this->request->getPost('cookies_title'),
            'rights_title' => $this->request->getPost('rights_title'),
            'retention_title' => $this->request->getPost('retention_title'),
            'third_party_title' => $this->request->getPost('third_party_title'),
            'changes_title' => $this->request->getPost('changes_title'),
        ];

        $model->update($id, $data);

        return redirect()->to(base_url('privacy-admin'))->with('success', 'Privacy Policy updated successfully');
    }
}
