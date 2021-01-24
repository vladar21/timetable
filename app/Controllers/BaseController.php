<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];
    protected $session;
    protected $scripts = [];


	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->session = \Config\Services::session();
        //session_start();

	}

    /**
     * @param $content
     */
    public function layout($page, $content)
    {
//        if ($this->is_ajax){
//            return;
//        }
        if (!isset($page)) $page='main';

        $this->styles['main'][] = 'tailwind.min.css';
        $this->styles['calendar'][] = 'calendar.min.css';
        $this->styles['calendar'][] = 'tailwind.min.css';

        //$this->scripts['main'][] = 'main.min.js';
        $this->scripts['calendar'][] = 'bootstrap.min.js';
        //$this->scripts['calendar'][] = 'calendar.min.js';
        $this->scripts['calendar'][] = 'jquery.min.js';
        $this->scripts['calendar'][] = 'jquery.validate.js';

//        $this->scripts['calendar'][] = 'fullcalendar-custom.js';
//        $this->scripts['calendar'][] = 'fullcalendar.main.js';
//        $this->scripts['calendar'][] = 'custom.js';



        $css_styles = "";
        if (!empty($this->styles)) {
            foreach ($this->styles[$page] as $key => $style) {
                $css_styles .= '<link rel="stylesheet" href="../../css/'.$style.'" type="text/css" />';
            }
        }
        $js_scripts = "";
        if (!empty($this->scripts)){
            foreach ($this->scripts[$page] as $key => $script) {
                $js_scripts.='<script src="../../js/' . $script . '" type="text/javascript"></script>';
            }
        }
//        $js_js_init = "";
//        if (!empty($this->js_init)){
//
//            foreach ($this->js_init as $key => $value) {
//                $js_js_init.="try{" . $value . "}catch(e){alert('SERVER JS_INIT ERROR: '+e)}\n";
//            }
//        }

        //$js_scripts.='<script type="text/javascript">$(function () {' . "\n" . $js_js_init . "\n" . '});</script>';

//        $result = $content;

        $data = [
            'styles' => $css_styles,
            'scripts' => $js_scripts,
            'header' => view('header_view'),
            'content' => isset($content) ? $content :  '',
//            'base_url' => $this->base_url,
            'footer' => view('footer_view'),
        ];
        echo view("layout", $data);
    }

}
