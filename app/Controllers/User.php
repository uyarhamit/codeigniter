<?php

namespace App\Controllers;

use App\Models\userModel;

class User extends BaseController
{
    public function allUser()
    {
        $users = new userModel();
        $allUser = $users->findAll();
        print_r($allUser);
    }

}
