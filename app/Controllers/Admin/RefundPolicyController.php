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
            'refund_title'            => $this->request->getPost('refund_title'),
            'refund_title_tag'        => $this->request->getPost('refund_title_tag'),
            'refund_subtitle'         => $this->request->getPost('refund_subtitle'),
            'refund_subtitle_tag'     => $this->request->getPost('refund_subtitle_tag'),
            'cancellation_title'      => $this->request->getPost('cancellation_title'),
            'cancellation_rentals_title'     => $this->request->getPost('cancellation_rentals_title'),
            'cancellation_refurbished_title' => $this->request->getPost('cancellation_refurbished_title'),
            'refund_title_sec'        => $this->request->getPost('refund_title_sec'),
            'refund_rentals_title'     => $this->request->getPost('refund_rentals_title'),
            'refund_refurbished_title' => $this->request->getPost('refund_refurbished_title'),
            'return_exchange_title'   => $this->request->getPost('return_exchange_title'),
            'exceptions_title'        => $this->request->getPost('exceptions_title'),
            'process_title'           => $this->request->getPost('process_title'),
            'late_missing_title'      => $this->request->getPost('late_missing_title'),
            'changes_policy_title'    => $this->request->getPost('changes_policy_title'),
        ];

        $model->update($id, $data);

        return redirect()->to('refund-admin')->with('success', 'Refund & Cancellation Policy updated successfully.');
    }
}
