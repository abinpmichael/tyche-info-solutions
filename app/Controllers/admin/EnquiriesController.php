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
            return redirect()->to('/login');
        }
    }

    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        $enquiryModel = new EnquiryModel();
        $data['enquiries'] = $enquiryModel->orderBy('id', 'DESC')->findAll();

        return view('admin/header') . view('admin/enquiries/index', $data) . view('admin/footer');
    }

    public function view($id)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        $enquiryModel = new EnquiryModel();
        $enquiry = $enquiryModel->find($id);

        if (!$enquiry) {
            return redirect()->to('/enquiries')->with('error', 'Enquiry not found.');
        }

        // Decode items JSON
        $enquiry['items'] = json_decode($enquiry['items'], true) ?? [];

        return view('admin/header') . view('admin/enquiries/view', ['enquiry' => $enquiry]) . view('admin/footer');
    }

    public function delete($id)
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        $enquiryModel = new EnquiryModel();
        $enquiry = $enquiryModel->find($id);

        if (!$enquiry) {
            return redirect()->to('/enquiries')->with('error', 'Enquiry not found.');
        }

        $enquiryModel->delete($id);
        return redirect()->to('/enquiries')->with('success', 'Enquiry deleted successfully.');
    }
}
