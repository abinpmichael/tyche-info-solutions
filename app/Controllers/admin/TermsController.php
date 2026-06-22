<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TermsConditionsModel;

class TermsController extends BaseController
{
    public function index()
    {
        $model = new TermsConditionsModel();
        $record = $model->find(1);

        if (!$record) {
            return redirect()->back()->with('error', 'Record not found');
        }

        echo view('Admin/header');
        echo view('Admin/terms/index', ['record' => $record]);
        echo view('Admin/footer');
    }

    public function update($id)
    {
        $model = new TermsConditionsModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'intro' => 'permit_empty',
            'rental_terms' => 'required',
            'refurbished_terms' => 'required',
            'payments_charges' => 'required',
            'delivery_collection' => 'required',
            'limitation_liability' => 'required',
            'privacy_terms' => 'required',
            'contact_email' => 'required|valid_email',
            'contact_phone1' => 'required',
            'contact_phone2' => 'required',
            'terms_title' => 'permit_empty',
            'terms_title_tag' => 'permit_empty',
            'terms_subtitle' => 'permit_empty',
            'terms_subtitle_tag' => 'permit_empty',
            'rental_title' => 'permit_empty',
            'refurbished_title' => 'permit_empty',
            'payments_title' => 'permit_empty',
            'delivery_title' => 'permit_empty',
            'liability_title' => 'permit_empty',
            'privacy_title_sec' => 'permit_empty',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'intro' => $this->request->getPost('terms_subtitle'),
            'rental_terms' => $this->request->getPost('rental_terms'),
            'refurbished_terms' => $this->request->getPost('refurbished_terms'),
            'payments_charges' => $this->request->getPost('payments_charges'),
            'delivery_collection' => $this->request->getPost('delivery_collection'),
            'limitation_liability' => $this->request->getPost('limitation_liability'),
            'privacy_terms' => $this->request->getPost('privacy_terms'),
            'contact_email' => $this->request->getPost('contact_email'),
            'contact_phone1' => $this->request->getPost('contact_phone1'),
            'contact_phone2' => $this->request->getPost('contact_phone2'),
            'terms_title' => $this->request->getPost('terms_title'),
            'terms_title_tag' => $this->request->getPost('terms_title_tag'),
            'terms_subtitle' => $this->request->getPost('terms_subtitle'),
            'terms_subtitle_tag' => $this->request->getPost('terms_subtitle_tag'),
            'rental_title' => $this->request->getPost('rental_title'),
            'refurbished_title' => $this->request->getPost('refurbished_title'),
            'payments_title' => $this->request->getPost('payments_title'),
            'delivery_title' => $this->request->getPost('delivery_title'),
            'liability_title' => $this->request->getPost('liability_title'),
            'privacy_title_sec' => $this->request->getPost('privacy_title_sec'),
        ];

        $model->update($id, $data);

        return redirect()->to(base_url('terms-admin'))->with('success', 'Terms and Conditions updated successfully');
    }
}
