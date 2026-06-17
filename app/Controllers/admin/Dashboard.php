<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function __construct()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
    }

    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login');
        }

        $db = \Config\Database::connect();

        // Stat counts
        $data['total_models']    = $db->table('models')->countAll();
        $data['total_brands']    = $db->table('brands')->countAll();
        $data['total_enquiries'] = $db->table('enquiries')->countAll();
        $data['total_services']  = $db->table('services')->countAll();
        $data['total_sliders']   = $db->table('slider')->countAll();
        $data['total_products']  = $db->table('product')->countAll();

        // New enquiries in last 7 days
        $data['new_enquiries'] = $db->table('enquiries')
            ->where('created_at >=', date('Y-m-d H:i:s', strtotime('-7 days')))
            ->countAllResults();

        // Laptop vs Desktop breakdown
        $data['laptop_count']  = $db->table('models')->where('type', '1')->countAllResults();
        $data['desktop_count'] = $db->table('models')->where('type', '2')->countAllResults();

        // Recent 5 enquiries
        $data['recent_enquiries'] = $db->table('enquiries')
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        // Recent 6 models (with brand name)
        $data['recent_models'] = $db->table('models')
            ->select('models.id, models.name, models.type, models.thumbnail, models.status, brands.b_name')
            ->join('brands', 'brands.b_id = models.b_id', 'left')
            ->orderBy('models.id', 'DESC')
            ->limit(6)
            ->get()
            ->getResultArray();

        echo view('Admin/header');
        echo view('Admin/dashboard', $data);
        echo view('Admin/footer');
    }
}
