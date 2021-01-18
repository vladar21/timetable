<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
        $data = [];
        $content =  view('home', $data);
        return $this->layout($content);
		//return view('welcome_message');
	}

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
