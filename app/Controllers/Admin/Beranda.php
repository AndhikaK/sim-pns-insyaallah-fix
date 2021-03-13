<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Beranda extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'subTitle' => '',
            'menuPos' => 'beranda',
        ];

        return view('admin/index', $data);
    }

    public function testPage()
    {
        return view('test');
    }
}
