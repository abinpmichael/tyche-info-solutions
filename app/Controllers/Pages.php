<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
      echo "new controller";
    }
   public function Showme($page= 'home'){
   	echo 'this page is :'.$page;
    }
}

