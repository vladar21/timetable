<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
        $data = [];
        $this->scripts[] = 'messagesID.js';
        $this->js_init[] = "removeMessages.init();";

        $content =  view('home', $data);
        return $this->layout($content);
	}

    public function register()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        $this->scripts[] = 'messagesID.js';
        $this->js_init[] = "removeMessages.init();";
        $content =  view('auth/register.php', $data);
        return $this->layout($content);
    }

    public function login()
    {
        $data = [];
        $this->scripts[] = 'messagesID.js';
        $this->js_init[] = "removeMessages.init();";
        $content =  view('auth/login.php', $data);
        return $this->layout($content);
    }

}
