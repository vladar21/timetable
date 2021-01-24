<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
        $data = [];
        $content =  view('home', $data);
        return $this->layout('main', $content);
		//return view('welcome_message');
	}

    public function register()
    {
        $data = [];
        $content =  view('auth/register.php', $data);
        return $this->layout('main', $content);
        //echo 'Hello World!';
    }

    public function login()
    {
        $data = [];
        $content =  view('auth/login.php', $data);
        return $this->layout('main', $content);
        //echo 'Hello World!';
    }

}
