<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
{
   

   echo view('admin/header');
    echo view('admin/dashboard');
    echo view('admin/footer');
    // This should match app/Views/admin/dashboard.php
}

}
