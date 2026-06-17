<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HomeModel;

class EmailSettingsController extends BaseController
{
    public function __construct()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
    }

    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        $model = new HomeModel();
        $data['record'] = $model->find(1);

        return view('Admin/header') . view('Admin/email-settings/index', $data) . view('Admin/footer');
    }

    public function update()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'enquiry_email' => [
                'label'  => 'Product Enquiry Notification Email',
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required'    => '{field} is required.',
                    'valid_email' => '{field} must be a valid email address.',
                ]
            ],
            'contact_email' => [
                'label'  => 'Contact Form Notification Email',
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required'    => '{field} is required.',
                    'valid_email' => '{field} must be a valid email address.',
                ]
            ],
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new HomeModel();
        $model->update(1, [
            'enquiry_email' => $this->request->getPost('enquiry_email'),
            'contact_email' => $this->request->getPost('contact_email'),
        ]);

        return redirect()->to('email-settings')->with('success', 'Email notification settings updated successfully.');
    }
}
