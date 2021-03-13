<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        return view('login');
    }

    public function signInAttempt()
    {
        if ($this->request->getMethod('POST')) {
            $username = $this->request->getPost('nip');
            $password = $this->request->getPost('password');
            $user = $this->usersModel->find($username);

            if (!empty($user) && $user['password'] == $password) {
                $this->setSession($user);

                if ($user['role'] == 'admin') {
                    return redirect()->to(base_url('admin'));
                } elseif ($user['role'] == 'user') {
                    return redirect()->to(base_url('user'));
                }
            } else {
                return redirect()->to(base_url('login'));
            }
        }
    }

    public function setSession($user)
    {
        $data = [
            'nip' => $user['nip'],
            'role' => $user['role'],
            'status' => $user['status'],
            'loggedIn' => true
        ];

        session()->set($data);
    }

    public function signOut()
    {
        session()->destroy();

        return redirect()->to(base_url('/login'));
    }
}
