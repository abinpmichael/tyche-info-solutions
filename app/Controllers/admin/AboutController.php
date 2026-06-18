<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AboutModel;

class AboutController extends BaseController
{
    public function __construct()
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }
    }

    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }

        $model = new AboutModel();
        $record = $model->find(1);

        if (!$record) {
            return redirect()->to('dashboard')->with('error', 'About record not found');
        }

        return view('Admin/header') . view('Admin/about/index', ['record' => $record]) . view('Admin/footer');
    }

    public function update($id)
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }

        $model = new AboutModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'about'       => 'required',
            'our_mission' => 'required',
            'our_vision'  => 'required',
            'our_values'  => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'about'       => $this->request->getPost('about'),
            'our_mission' => $this->request->getPost('our_mission'),
            'our_vision'  => $this->request->getPost('our_vision'),
            'our_values'  => $this->request->getPost('our_values'),
        ];

        // Handle file upload
        $img = $this->request->getFile('img');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $imgName = $img->getRandomName();
            $img->move(WRITEPATH . 'uploads', $imgName);
            $data['img'] = $imgName;
        }

        $model->update($id, $data);

        return redirect()->to('about')->with('success', 'About Us page updated successfully.');
    }
}
