<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Preventlogin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('loggedIn')) {
            if (session()->get('role') == 'admin') {
                return redirect()->to(base_url('/admin'));
            }

            if (session()->get('role') == 'user') {
                return redirect()->to(base_url('user'));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
