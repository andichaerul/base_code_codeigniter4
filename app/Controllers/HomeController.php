<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class HomeController extends Controller
{

    public function __construct()
    {
        helper("checkLogin");
        checkLoginHelper();
    }

    public function index(): string
    {
        
        return view("v_home");
    }
}
