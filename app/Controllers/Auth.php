<?php namespace App\Controllers;


class Auth extends BaseController
{
    public function register()
    {
        $data = [];
        $content =  view('auth/register.php', $data);
        return $this->layout($content);
        //echo 'Hello World!';
    }

    public function login()
    {
        $data = [];
        $content =  view('auth/login.php', $data);
        return $this->layout($content);
        //echo 'Hello World!';
    }
}
