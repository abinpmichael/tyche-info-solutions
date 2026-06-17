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

        echo view('admin/header');
        echo view('admin/privacy/index', ['record' => $record]);
        echo view('admin/footer');
    }

    public function update($id)
    {
        $model = new PrivacyPolicyModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'intro_title' => 'required',
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
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'intro_title' => $this->request->getPost('intro_title'),
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
        ];

        $model->update($id, $data);

        return redirect()->to('/privacy-admin')->with('success', 'Privacy Policy updated successfully');
    }
}
