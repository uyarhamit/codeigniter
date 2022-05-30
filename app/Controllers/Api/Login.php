<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\userModel;

class Login extends BaseController
{
    public function Index()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getPost()['data'];
            $data = json_decode($data, true);
            $data['password'] = md5($data['password']);
            $user = new userModel();
            $result = $user->where(['email' => $data['email'], 'password' => $data['password']])->first();
            if ($result) {
                session();
                $_SESSION['name'] = $result['name'];
                $_SESSION['email'] = $result['email'];
                $json['text']      = "You are redirecting to home";
                $json['script'][]  = "location.href='/home';";
            } else {
                $json['text']      = "User couldn't find. Check your information!";
                $json['script'][]  = "$('.loginTabButton').trigger('click');";
            }
            echo json_encode($json);
            exit;
        } else {
            $json['status']   = "error";
            $json['text']     = "This is for ajax!";
            echo json_encode($json);
            exit;
        }
    }
}
