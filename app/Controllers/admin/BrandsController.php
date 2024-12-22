<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BrandModel;

class BrandsController extends BaseController
{
    public function index()
    {

        $brandModel = new BrandModel();
        $data['brands'] = $brandModel->findAll();
          return view('admin/header') . view('admin/brands/index', $data) . view('admin/footer');
}
    public function create()
    {
       // return view('admin/brands/create');
         return view('admin/header') . view('admin/brands/create') . view('admin/footer');
    }

    public function store()
    {
        $brandModel = new BrandModel();
        $data = [
            'b_name' => $this->request->getPost('b_name'),
            'b_desc' => $this->request->getPost('b_desc'),
            'b_status' => $this->request->getPost('b_status'),
        ];
        $brandModel->insert($data);
        return redirect()->to('brands')->with('success', 'Brand added successfully');
    }

    public function edit($id)
    {
        $brandModel = new BrandModel();
        $data['brand'] = $brandModel->find($id);
        return view('admin/header') . view('admin/brands/edit', $data). view('admin/footer');
    }

    public function update($id)
    {
        $brandModel = new BrandModel();
        $data = [
            'b_name' => $this->request->getPost('b_name'),
            'b_desc' => $this->request->getPost('b_desc'),
            'b_status' => $this->request->getPost('b_status'),
        ];
        $brandModel->update($id, $data);
        return redirect()->to('/brands')->with('success', 'Brand updated successfully');
    }

    public function delete($id)
    {
        $brandModel = new BrandModel();
        $brandModel->delete($id);
        return redirect()->to('/admin/brands')->with('success', 'Brand deleted successfully');
    }
}
