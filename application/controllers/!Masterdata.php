<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Masterdata extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
			$this->isLogin();
	}

	protected function isLogin()
    {
        $isLogin = $this->session->userdata('is_login');
        if(!$isLogin){
            redirect(base_url());
        }
    }

	public function index($page = null)
	{
		$main_view 		= 'home/masterdata';
		$this->load->view('template', compact('main_view'));
	}

}