<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        session();
        if (!isset($_SESSION['email'])) {
            return view('Login');
        } else {
            return view('home');
        }
    }
}
