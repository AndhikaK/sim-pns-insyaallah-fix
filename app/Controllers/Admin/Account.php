<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use Exception;

class Account extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UsersModel();
    }
    public function gantiPassView()
    {
        $admin = $this->userModel->find('admin');

        $data = [
            'title' => 'Ganti Password',
            'passLama' => $admin['password']
        ];

        return view('admin/ganti_password', $data);
    }
    public function gantiPassword()
    {
        $newPass = $this->request->getVar('confirmPass');

        try {
            $this->userModel->update('admin', ['password' => $newPass]);

            session()->setFlashdata('success-edit', "Password berhasil di ganti!");
        } catch (Exception $e) {
            session()->setFlashdata('success-edit', $e);
        }

        return redirect()->back();
    }

    public function resetPassword()
    {
        try {
            $this->userModel->update('admin', ['password' => 'admin']);

            session()->setFlashdata('success-edit', "Password berhasil di reset!");
        } catch (Exception $e) {
            session()->setFlashdata('success-edit', $e);
        }

        return redirect()->back();
    }
}
