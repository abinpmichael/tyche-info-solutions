<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HomeModel;

class HomeController extends BaseController
{
    public function __construct()
    {
        // No redirect here because CI4 constructors cannot cancel executions.
        // Auth is checked in methods and globally via the 'auth' route filter.
    }

    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }

        $model = new HomeModel();
        $record = $model->find(1);

        // Fallback: If no record with ID 1 exists, create one with defaults to prevent crashes
        if (!$record) {
            $model->insert([
                'id' => 1,
                'welcome_note' => '<p>Welcome to Tyche Info Solutions</p>',
                'r_link'       => '#',
                'w_img'        => '',
                'why'          => '',
                'why_tags'     => '',
                'we_serve'     => '',
                'we_tag'       => '',
                'meta_tite'    => 'Home',
                'welcome_title'         => 'Welcome to Tyche Info Solutions',
                'welcome_title_tag'     => 'h4',
                'welcome_subtitle'      => 'Best Dealers for Rental and Refurbished Services in Kochi',
                'welcome_subtitle_tag'  => 'h5',
                'products_title'        => 'Our Laptops and Desktops Collections',
                'products_title_tag'    => 'h4',
                'products_subtitle'     => 'Latest collection of Rental & Refurbished laptops and Desktops available.',
                'products_subtitle_tag' => 'h5',
                'why_title'             => 'Why Choose Us',
                'why_title_tag'         => 'h4',
                'why_subtitle'          => 'Tyche Info Solutions is Kerala\'s leading provider of rental solutions.',
                'why_subtitle_tag'      => 'h5',
                'brands_title'          => 'Our Brands',
                'brands_title_tag'      => 'h4',
                'brands_subtitle'       => 'Bringing you products from the world\'s best brands.',
                'brands_subtitle_tag'   => 'h5'
            ]);
            $record = $model->find(1);
        }

        $data['record'] = $record;
        return view('Admin/header') . view('Admin/home/index', $data) . view('Admin/footer');
    }

    public function create()
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }
        return view('your_table/create');
    }

    public function store()
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }
        $model = new HomeModel();
        $data = $this->request->getPost();
        $model->save($data);
        return redirect()->to(base_url('home'));
    }

    public function edit($id)
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }
        $model = new HomeModel();
        $data['record'] = $model->find($id);
        return view('your_table/edit', $data);
    }

    public function update($id)
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }

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
                ],
            ],
        ]);

        // Validate input
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('msg', $this->validator->getErrors());
        }

        // Collect input data including heading titles and tags
        $data = [
            'welcome_note'          => $this->request->getPost('welcome_note'),
            'r_link'                => $this->request->getPost('r_link'),
            'why'                   => $this->request->getPost('why'),
            'why_tags'              => $this->request->getPost('why_tags'),
            'we_serve'              => $this->request->getPost('we_serve'),
            'we_tag'                => $this->request->getPost('we_tag'),
            'welcome_title'         => $this->request->getPost('welcome_title'),
            'welcome_title_tag'     => $this->request->getPost('welcome_title_tag'),
            'welcome_subtitle'      => $this->request->getPost('welcome_subtitle'),
            'welcome_subtitle_tag'  => $this->request->getPost('welcome_subtitle_tag'),
            'products_title'        => $this->request->getPost('products_title'),
            'products_title_tag'    => $this->request->getPost('products_title_tag'),
            'products_subtitle'     => $this->request->getPost('products_subtitle'),
            'products_subtitle_tag' => $this->request->getPost('products_subtitle_tag'),
            'why_title'             => $this->request->getPost('why_title'),
            'why_title_tag'         => $this->request->getPost('why_title_tag'),
            'why_subtitle'          => $this->request->getPost('why_subtitle'),
            'why_subtitle_tag'      => $this->request->getPost('why_subtitle_tag'),
            'brands_title'          => $this->request->getPost('brands_title'),
            'brands_title_tag'      => $this->request->getPost('brands_title_tag'),
            'brands_subtitle'       => $this->request->getPost('brands_subtitle'),
            'brands_subtitle_tag'   => $this->request->getPost('brands_subtitle_tag'),
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

        return redirect()->to(base_url('home'))->with('success', 'Record updated successfully');
    }

    public function delete($id)
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }
        $model = new HomeModel();
        $model->delete($id);
        return redirect()->to(base_url('home'));
    }
}
