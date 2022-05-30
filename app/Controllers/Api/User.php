<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\userModel;

class User extends BaseController
{

    public function add()
    {
        if ($this->request->isAJAX()) {
            $data    = $this->request->getPost()['data'];
            $data    = json_decode($data, true);
            $data['password'] = md5($data['password']);
            $users   = new userModel();
            $checkUser = $users->where('email', $data['email'])->first();
            if ($checkUser) {
                $json['status']   = "error";
                $json['text']     = "This e-mail already registered!";
                $json['script'][] = "$('#email','#register-tab').addClass('is-invalid');";
            } else {
                $result  = $users->save($data);
                $json    = array();
                if ($result) {
                    $json['status']   = "success";
                    $json['text']     = "User added. You can login now!";
                    $json['script'][] = "clearForm('#register-tab');";
                    $json['script'][] = "$('.loginTabButton').trigger('click') ";
                } else {
                    $json['status']   = "error";
                    $json['text']     = "User couldn't add. Place check the values!";
                }
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
