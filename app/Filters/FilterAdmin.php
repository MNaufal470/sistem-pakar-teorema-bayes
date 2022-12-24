<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('role') === '0'){
            return redirect()->to('/Home');
          }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {   
        if(session()->get('role') === '1'){
            return redirect()->to('/Admin');
          }
    }
}