<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SeoModel;

class SeoController extends BaseController
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

        $model = new SeoModel();
        $data['records'] = $model->findAll();
        
        return view('admin/header') . view('admin/seo/index', $data) . view('admin/footer');
    }

    public function edit($id)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        $model = new SeoModel();
        $data['record'] = $model->find($id);

        if (!$data['record']) {
            return redirect()->to('seo-admin')->with('error', 'Page record not found.');
        }

        return view('admin/header') . view('admin/seo/edit', $data) . view('admin/footer');
    }

    public function update($id)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        $model = new SeoModel();
        $record = $model->find($id);

        if (!$record) {
            return redirect()->to('seo-admin')->with('error', 'Page record not found.');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'meta_title' => [
                'label'  => 'Meta Title',
                'rules'  => 'required|max_length[255]',
                'errors' => [
                    'required'   => '{field} is required.',
                    'max_length' => '{field} cannot exceed 255 characters.'
                ]
            ],
            'meta_description' => [
                'label'  => 'Meta Description',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} is required.'
                ]
            ],
            'meta_keywords' => [
                'label'  => 'Meta Keywords',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} is required.'
                ]
            ]
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'meta_title'       => $this->request->getPost('meta_title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'meta_keywords'    => $this->request->getPost('meta_keywords'),
            'schema_code'      => $this->request->getPost('schema_code'),
            'header_code'      => $this->request->getPost('header_code'),
            'body_code'        => $this->request->getPost('body_code'),
            'footer_code'      => $this->request->getPost('footer_code'),
            'updated_at'       => date('Y-m-d H:i:s')
        ];

        $model->update($id, $data);

        return redirect()->to('seo-admin')->with('success', 'SEO settings updated successfully for ' . $record['page_name']);
    }

    public function create()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        return view('admin/header') . view('admin/seo/create') . view('admin/footer');
    }

    public function store()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        $model = new SeoModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'page_route' => [
                'label'  => 'Page Route',
                'rules'  => 'required|is_unique[seo_settings.page_route]|max_length[100]',
                'errors' => [
                    'required'  => '{field} is required.',
                    'is_unique' => 'An SEO configuration for this route already exists.',
                    'max_length'=> '{field} cannot exceed 100 characters.'
                ]
            ],
            'page_name' => [
                'label'  => 'Page Name',
                'rules'  => 'required|max_length[100]',
                'errors' => [
                    'required'   => '{field} is required.',
                    'max_length' => '{field} cannot exceed 100 characters.'
                ]
            ],
            'meta_title' => [
                'label'  => 'Meta Title',
                'rules'  => 'required|max_length[255]',
                'errors' => [
                    'required'   => '{field} is required.',
                    'max_length' => '{field} cannot exceed 255 characters.'
                ]
            ],
            'meta_description' => [
                'label'  => 'Meta Description',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} is required.'
                ]
            ],
            'meta_keywords' => [
                'label'  => 'Meta Keywords',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} is required.'
                ]
            ]
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Clean route: remove leading/trailing slashes
        $pageRoute = trim($this->request->getPost('page_route'), '/ ');

        $data = [
            'page_route'       => $pageRoute,
            'page_name'        => $this->request->getPost('page_name'),
            'meta_title'       => $this->request->getPost('meta_title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'meta_keywords'    => $this->request->getPost('meta_keywords'),
            'schema_code'      => $this->request->getPost('schema_code'),
            'header_code'      => $this->request->getPost('header_code'),
            'body_code'        => $this->request->getPost('body_code'),
            'footer_code'      => $this->request->getPost('footer_code'),
            'updated_at'       => date('Y-m-d H:i:s')
        ];

        $model->insert($data);

        return redirect()->to('seo-admin')->with('success', 'SEO settings created successfully for ' . $data['page_name']);
    }
}
