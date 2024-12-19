<?php

namespace App\Controllers;

use App\Models\brandModel;

class BrandController extends BaseController
{
    public function index()
    {
        $brandModel = new BrandModel();
        $data['brands'] = $BrandModel->findAll(); // Fetch all products
        return view('brand/index', $data);
    }

    public function create()
    {
        return view('brand/create');
    }

    public function store()
    {
        $brandModel = new BrandModel();
        $brandModel->save([
            'b_name' => $this->request->getPost('b_name'),
            'b_status' => $this->request->getPost('b_status'),
            'b_desc' => $this->request->getPost('b_desc'),
        ]);
        return redirect()->to('/brand');
    }

    public function edit($id)
    {
        $brandModel = new BrandModel();
        $data['brand'] = $brandModel->find($id);
        return view('brand/edit', $data);
    }

    public function update($id)
    {
        $brandModel = new brandModel();
        $brandModel->update($id, [
            'b_name' => $this->request->getPost('b_name'),
            'b_status' => $this->request->getPost('b_status'),
            'b_desc' => $this->request->getPost('b_desc'),
        ]);
        return redirect()->to('/brand');
    }

    public function delete($id)
    {
        $brandModel = new brandModel();
        $brandModel->delete($id);
        return redirect()->to('/brand');
    }
}
