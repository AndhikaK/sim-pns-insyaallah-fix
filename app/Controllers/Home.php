<?php

namespace App\Controllers;

class Home extends BaseController
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

	public function testPost()
	{
		dd($this->request->getVar());
	}
}
