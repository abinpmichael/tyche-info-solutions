<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HomeModel;

class HomeController extends BaseController
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
       
        $model = new HomeModel();
        $data['record'] = $model->find(1);
        return view('Admin/header').view('Admin/home/index', $data).view('Admin/footer');
    }

    public function create()
    {
        return view('your_table/create');
    }

    public function store()
    {
        $model = new HomeModel();
        $data = $this->request->getPost();
        $model->save($data);
        return redirect()->to(base_url('your-table'));
    }

    public function edit($id)
    {
        $model = new HomeModel();
        $data['record'] = $model->find($id);
        return view('your_table/edit', $data);
    }

    public function update($id)
    {
        $homeTableModel = new \App\Models\HomeModel();
    $validation = \Config\Services::validation();

    // Set validation rules
    $validation->setRules([
        'welcome_note' => [
            'label' => 'Welcome Note',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} is required.',
            ],
        ],
        'r_link' => [
            'label' => 'Redirect Link',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} is required.',
                'valid_url' => '{field} must be a valid URL.',
            ],
        ],
    ]);

    // Validate input
    if (!$this->validate($validation->getRules())) {
        return redirect()->back()->withInput()->with('msg', $this->validator->getErrors());
    }

    // Collect input data
    $data = [
        'welcome_note' => $this->request->getPost('welcome_note'),
        'r_link'       => $this->request->getPost('r_link'),
        'why'          => $this->request->getPost('why'),
        'why_tags'     => $this->request->getPost('why_tags'),
        'we_serve'     => $this->request->getPost('we_serve'),
        'we_tag'       => $this->request->getPost('we_tag'),
    ];

    // Handle image upload
    $img = $this->request->getFile('w_img');
    if ($img && $img->isValid() && !$img->hasMoved()) {
        $imgName = $img->getRandomName();
        $img->move(WRITEPATH . 'uploads/home', $imgName);
        $data['w_img'] = $imgName;
    }

    // Update the record in the database
    $homeTableModel->update($id, $data);

    return redirect()->to('home')->with('success', 'Record updated successfully');
    }

    public function delete($id)
    {
        $model = new HomeModel();
        $model->delete($id);
        return redirect()->to(base_url('your-table'));
    }
}
