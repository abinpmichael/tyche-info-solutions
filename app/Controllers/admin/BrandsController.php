<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BrandModel;

class BrandsController extends BaseController
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
         $validation = \Config\Services::validation();
          // Set validation rules
  $validation->setRules([
    'b_name' => [
        'label' => 'Brand Name',
        'rules' => 'required',
        'errors' => [
            'required' => '{field} is required.',
           
        ],
    ],
    'b_desc' => [
        'label' => 'Brand Description',
        'rules' => 'required',
        'errors' => [
            'required' => '{field} is required.',
            
        ],
    ],
    'b_status' => [
        'label' => 'Brand Status',
        'rules' => 'required|in_list[1,0]',
        'errors' => [
            'required' => '{field} is required.',
            
        ],
    ],
]);

    if (!$this->validate($validation->getRules())) {
        return redirect()->back()->withInput()->with('msg', $this->validator->getErrors());
    }
        $data = [
            'b_name' => $this->request->getPost('b_name'),
            'b_desc' => $this->request->getPost('b_desc'),
            'b_status' => $this->request->getPost('b_status'),
        ];
         $img = $this->request->getFile('img');
    if ($img && $img->isValid() && !$img->hasMoved()) {
        $imgName = $img->getRandomName();
        $img->move(WRITEPATH . 'uploads/brand', $imgName);

        // Add the thumbnail name to the data array
        $data['img'] = $imgName;
    }


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
         $validation = \Config\Services::validation();
          // Set validation rules
  $validation->setRules([
    'b_name' => [
        'label' => 'Brand Name',
        'rules' => 'required',
        'errors' => [
            'required' => '{field} is required.',
           
        ],
    ],
    'b_desc' => [
        'label' => 'Brand Description',
        'rules' => 'required',
        'errors' => [
            'required' => '{field} is required.',
            
        ],
    ],
    'b_status' => [
        'label' => 'Brand Status',
        'rules' => 'required|in_list[1,0]',
        'errors' => [
            'required' => '{field} is required.',
            
        ],
    ],
]);

         if (!$this->validate($validation->getRules())) {
        return redirect()->back()->withInput()->with('msg', $this->validator->getErrors());
    }
        $data = [
            'b_name' => $this->request->getPost('b_name'),
            'b_desc' => $this->request->getPost('b_desc'),
            'b_status' => $this->request->getPost('b_status'),
        ];
        $img = $this->request->getFile('img');
    if ($img && $img->isValid() && !$img->hasMoved()) {
        $imgName = $img->getRandomName();
        $img->move(WRITEPATH . 'uploads/brand', $imgName);

        // Add the thumbnail name to the data array
        $data['img'] = $imgName;
    }
        $brandModel->update($id, $data);
        return redirect()->to('/brands')->with('success', 'Brand updated successfully');
    }

    public function delete($id)
    {
        $brandModel = new BrandModel();
        $brandModel->delete($id);
        return redirect()->to('/brands')->with('success', 'Brand deleted successfully');
    }
}
