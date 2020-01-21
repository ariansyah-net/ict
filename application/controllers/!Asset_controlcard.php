<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Asset_controlcard extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
			$this->load->model('Asset_controlcard_model', 'asset_controlcard', true);
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

    $controlcard	= $this->asset_controlcard->join('users')
							  														->join('computers')
  																					->joincoy('asset_controlcard')
  																					->orderBy('id_controlcard', 'desc')
  																					->paginate($page)
  																					->getAll();
		$jml 					= $this->asset_controlcard->orderBy('id_controlcard')->getAll();
		$jumlah 			= count($jml);
		$main_view 		= 'v-asset-controlcard/index';
		$pagination 	= $this->asset_controlcard->makePagination(site_url('asset_controlcard'), 2, $jumlah);
		$this->load->view('template', compact('main_view', 'controlcard', 'pagination', 'jumlah'));
	}


}
