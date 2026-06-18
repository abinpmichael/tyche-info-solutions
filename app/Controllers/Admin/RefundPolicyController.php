<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RefundPolicyModel;

class RefundPolicyController extends BaseController
{
    public function __construct()
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }
    }

    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }

        $model  = new RefundPolicyModel();
        $record = $model->find(1);

        if (!$record) {
            return redirect()->back()->with('error', 'Record not found');
        }

        return view('Admin/header')
             . view('Admin/refund-policy/index', ['record' => $record])
             . view('Admin/footer');
    }

    public function update($id)
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }

        $model = new RefundPolicyModel();

        $data = [
            'cancellation_rentals'    => $this->request->getPost('cancellation_rentals'),
            'cancellation_refurbished'=> $this->request->getPost('cancellation_refurbished'),
            'refund_rentals'          => $this->request->getPost('refund_rentals'),
            'refund_refurbished'      => $this->request->getPost('refund_refurbished'),
            'return_exchange'         => $this->request->getPost('return_exchange'),
            'exceptions'              => $this->request->getPost('exceptions'),
            'process'                 => $this->request->getPost('process'),
            'late_missing'            => $this->request->getPost('late_missing'),
            'changes_policy'          => $this->request->getPost('changes_policy'),
        ];

        $model->update($id, $data);

        return redirect()->to('refund-admin')->with('success', 'Refund & Cancellation Policy updated successfully.');
    }
}
