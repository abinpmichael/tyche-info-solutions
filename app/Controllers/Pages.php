<?php

namespace App\Controllers;

class Pages extends BaseController
{
   
   public function index($page= 'home'){
     // Check if the requested view exists
        if (!is_file(APPPATH . 'Views/Pages/' . $page . '.php')) {
            // If the page doesn't exist, show a 404 error
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
   //	echo 'this page is :'.$page;
   	echo view('templates/header');
   	echo view('Pages/'.$page);
   	echo view('templates/footer');

    }
}

