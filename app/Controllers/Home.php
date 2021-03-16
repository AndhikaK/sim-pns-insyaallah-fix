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

		return redirect()->to('/login');
	}

	public function testPost()
	{
		dd($this->request->getVar());
	}
}
