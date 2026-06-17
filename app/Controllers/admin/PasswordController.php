<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class PasswordController extends BaseController
{
    public function __construct()
    {
        // Ensure user is logged in
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
    }

    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        return view('Admin/header') . view('Admin/password/index') . view('Admin/footer');
    }

    public function update()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        $validation = \Config\Services::validation();

        $validation->setRules([
            'current_password' => [
                'label'  => 'Current Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} is required.'
                ]
            ],
            'new_password' => [
                'label'  => 'New Password',
                'rules'  => 'required|min_length[5]',
                'errors' => [
                    'required'   => '{field} is required.',
                    'min_length' => '{field} must be at least 5 characters long.'
                ]
            ],
            'confirm_password' => [
                'label'  => 'Confirm Password',
                'rules'  => 'required|matches[new_password]',
                'errors' => [
                    'required' => '{field} is required.',
                    'matches'  => '{field} must match the New Password.'
                ]
            ]
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $username = session()->get('username');
        $user = $userModel->getUserByUsername($username);

        if (!$user || !$userModel->validatePassword($this->request->getPost('current_password'), $user['password'])) {
            return redirect()->back()->with('error', 'Incorrect current password.');
        }

        // Hash new password and update
        $newPassword = $this->request->getPost('new_password');
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $userModel->update($user['id'], [
            'password' => $hashedPassword
        ]);

        return redirect()->to('admin/change-password')->with('success', 'Password changed successfully!');
    }
}
