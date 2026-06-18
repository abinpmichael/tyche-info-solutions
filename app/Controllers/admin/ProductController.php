<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class ProductController extends BaseController
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
        $ProductModel = new ProductModel();
        $data['product'] = $ProductModel->findAll();
          return view('Admin/header') . view('Admin/product/index', $data) . view('Admin/footer');
}
    public function create()
    {
       // return view('Admin/brands/create');
         return view('Admin/header') . view('Admin/product/create') . view('Admin/footer');
    }

    public function store()
    {
        $ProductModel = new ProductModel();
        $data = [
            'p_name' => $this->request->getPost('p_name'),
            'p_desc' => $this->request->getPost('p_desc'),
            'p_status' => $this->request->getPost('p_status'),
        ];
        $ProductModel->insert($data);
        return redirect()->to('product')->with('success', 'Brand added successfully');
    }

    public function edit($id)
    {
        $ProductModel = new ProductModel();
        $data['product'] = $ProductModel->find($id);
        return view('Admin/header') . view('Admin/product/edit', $data). view('Admin/footer');
    }

    public function update($id)
    {
        $ProductModel = new ProductModel();
        $data = [
            'p_name' => $this->request->getPost('p_name'),
            'p_desc' => $this->request->getPost('p_desc'),
            'p_status' => $this->request->getPost('p_status'),
        ];
        $ProductModel->update($id, $data);
        return redirect()->to(base_url('product'))->with('success', 'Product updated successfully');
    }

    public function delete($id)
    {
        $ProductModel = new ProductModel();
        $ProductModel->delete($id);
        return redirect()->to(base_url('product'))->with('success', 'Brand deleted successfully');
    }
}
