<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index()
    {
        $userModel = new \App\Models\UserModel();
        $users = $userModel->findAll();

        return view('user/index', [
            'users' => $users,
        ]);
    }
}