<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
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
   echo view('admin/header');
    echo view('admin/dashboard');
    echo view('admin/footer');
    // This should match app/Views/admin/dashboard.php
}

}
