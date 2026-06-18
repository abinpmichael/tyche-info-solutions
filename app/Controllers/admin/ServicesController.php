<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;

class ServicesController extends BaseController
{
    public function __construct()
    {
        // Ensure the user is logged in
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }
    }

    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }

        $serviceModel = new ServiceModel();
        $data['services'] = $serviceModel->findAll();

        return view('Admin/header') . view('Admin/services/index', $data) . view('Admin/footer');
    }

    public function create()
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }

        return view('Admin/header') . view('Admin/services/create') . view('Admin/footer');
    }

    public function store()
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }

        $serviceModel = new ServiceModel();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'title' => 'required',
            'desc1' => 'required'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'desc1' => $this->request->getPost('desc1'),
            'desc2' => $this->request->getPost('desc2'),
            'status' => $this->request->getPost('status') ?? 1
        ];

        // Handle image upload
        $img = $this->request->getFile('img');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $imgName = $img->getRandomName();
            $img->move(WRITEPATH . 'uploads/services', $imgName);
            $data['img'] = $imgName;
        }

        $serviceModel->save($data);
        return redirect()->to(base_url('services-admin'))->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }

        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if (!$service) {
            return redirect()->to(base_url('services-admin'))->with('error', 'Service not found.');
        }

        return view('Admin/header') . view('Admin/services/edit', ['service' => $service]) . view('Admin/footer');
    }

    public function update($id)
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }

        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if (!$service) {
            return redirect()->to(base_url('services-admin'))->with('error', 'Service not found.');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required',
            'desc1' => 'required'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'desc1' => $this->request->getPost('desc1'),
            'desc2' => $this->request->getPost('desc2'),
            'status' => $this->request->getPost('status') ?? 1
        ];

        // Handle image upload
        $img = $this->request->getFile('img');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            // Delete old image if it exists in uploads folder
            if (!empty($service['img']) && file_exists(WRITEPATH . 'uploads/services/' . $service['img'])) {
                unlink(WRITEPATH . 'uploads/services/' . $service['img']);
            }
            $imgName = $img->getRandomName();
            $img->move(WRITEPATH . 'uploads/services', $imgName);
            $data['img'] = $imgName;
        }

        $serviceModel->update($id, $data);
        return redirect()->to(base_url('services-admin'))->with('success', 'Service updated successfully.');
    }

    public function delete($id)
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }

        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if (!$service) {
            return redirect()->to(base_url('services-admin'))->with('error', 'Service not found.');
        }

        // Delete uploaded image file
        if (!empty($service['img']) && file_exists(WRITEPATH . 'uploads/services/' . $service['img'])) {
            unlink(WRITEPATH . 'uploads/services/' . $service['img']);
        }

        $serviceModel->delete($id);
        return redirect()->to(base_url('services-admin'))->with('success', 'Service deleted successfully.');
    }
}
