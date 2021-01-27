<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        // if user not logged in
        //if(!isset($_SESSION['logged_in'])){
        if(!session()->get('logged_in')) {
            // then redirect to login page

            header("Access-Control-Allow-Origin: *");
            return redirect()->to('home/login');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}