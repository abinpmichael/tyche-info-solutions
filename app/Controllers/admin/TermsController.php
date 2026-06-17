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

        echo view('admin/header');
        echo view('admin/terms/index', ['record' => $record]);
        echo view('admin/footer');
    }

    public function update($id)
    {
        $model = new TermsConditionsModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'intro' => 'required',
            'rental_terms' => 'required',
            'refurbished_terms' => 'required',
            'payments_charges' => 'required',
            'delivery_collection' => 'required',
            'limitation_liability' => 'required',
            'privacy_terms' => 'required',
            'contact_email' => 'required|valid_email',
            'contact_phone1' => 'required',
            'contact_phone2' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'intro' => $this->request->getPost('intro'),
            'rental_terms' => $this->request->getPost('rental_terms'),
            'refurbished_terms' => $this->request->getPost('refurbished_terms'),
            'payments_charges' => $this->request->getPost('payments_charges'),
            'delivery_collection' => $this->request->getPost('delivery_collection'),
            'limitation_liability' => $this->request->getPost('limitation_liability'),
            'privacy_terms' => $this->request->getPost('privacy_terms'),
            'contact_email' => $this->request->getPost('contact_email'),
            'contact_phone1' => $this->request->getPost('contact_phone1'),
            'contact_phone2' => $this->request->getPost('contact_phone2'),
        ];

        $model->update($id, $data);

        return redirect()->to('/terms-admin')->with('success', 'Terms and Conditions updated successfully');
    }
}
