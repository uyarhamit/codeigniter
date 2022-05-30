<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function Index()
    {
        return view('login');
    }
    public function LogOut()
    {
        session();
        session_destroy();
        return view('login');
    }
}
