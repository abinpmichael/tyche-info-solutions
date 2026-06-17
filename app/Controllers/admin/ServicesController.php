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
            return redirect()->to('/login');
        }
    }

    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        $serviceModel = new ServiceModel();
        $data['services'] = $serviceModel->findAll();

        return view('admin/header') . view('admin/services/index', $data) . view('admin/footer');
    }

    public function create()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        return view('admin/header') . view('admin/services/create') . view('admin/footer');
    }

    public function store()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
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
        return redirect()->to('/services-admin')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if (!$service) {
            return redirect()->to('/services-admin')->with('error', 'Service not found.');
        }

        return view('admin/header') . view('admin/services/edit', ['service' => $service]) . view('admin/footer');
    }

    public function update($id)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if (!$service) {
            return redirect()->to('/services-admin')->with('error', 'Service not found.');
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
        return redirect()->to('/services-admin')->with('success', 'Service updated successfully.');
    }

    public function delete($id)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if (!$service) {
            return redirect()->to('/services-admin')->with('error', 'Service not found.');
        }

        // Delete uploaded image file
        if (!empty($service['img']) && file_exists(WRITEPATH . 'uploads/services/' . $service['img'])) {
            unlink(WRITEPATH . 'uploads/services/' . $service['img']);
        }

        $serviceModel->delete($id);
        return redirect()->to('/services-admin')->with('success', 'Service deleted successfully.');
    }
}
