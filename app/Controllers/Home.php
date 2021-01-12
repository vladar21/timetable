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

	//--------------------------------------------------------------------

}
