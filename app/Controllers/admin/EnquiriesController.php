<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EnquiryModel;

class EnquiriesController extends BaseController
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

        $enquiryModel = new EnquiryModel();
        $data['enquiries'] = $enquiryModel->orderBy('id', 'DESC')->findAll();

        return view('Admin/header') . view('Admin/enquiries/index', $data) . view('Admin/footer');
    }

    public function view($id)
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }

        $enquiryModel = new EnquiryModel();
        $enquiry = $enquiryModel->find($id);

        if (!$enquiry) {
            return redirect()->to(base_url('enquiries'))->with('error', 'Enquiry not found.');
        }

        // Decode items JSON
        $enquiry['items'] = json_decode($enquiry['items'], true) ?? [];

        return view('Admin/header') . view('Admin/enquiries/view', ['enquiry' => $enquiry]) . view('Admin/footer');
    }

    public function delete($id)
    {
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }

        $enquiryModel = new EnquiryModel();
        $enquiry = $enquiryModel->find($id);

        if (!$enquiry) {
            return redirect()->to(base_url('enquiries'))->with('error', 'Enquiry not found.');
        }

        $enquiryModel->delete($id);
        return redirect()->to(base_url('enquiries'))->with('success', 'Enquiry deleted successfully.');
    }
}
