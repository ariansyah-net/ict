<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Asset_category extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
			$this->load->model('Asset_category_model', 'asset_category', true);
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
  		$asset_category 		= $this->asset_category->paginate($page)->orderBy('id_assetcategory', 'desc')->getAll();
  		$jml 					= $this->asset_category->getAll();

	    $jumlah 			      = count($jml);
  		$main_view 		      = 'v-asset-category/index';
  		$pagination 	      = $this->asset_category->makePagination(site_url('asset_category'), 2, $jumlah);
  		$this->load->view('template', compact('main_view', 'asset_category', 'pagination', 'jumlah'));
  	}

  public function create()
  	{
  		if (!$_POST) {
  			$input = (object) $this->asset_category->getDefaultValues();
  		} else {
  			$input = (object) $this->input->post(null, true);
  		}
  		if (!$this->asset_category->validate())
  		{
  			$halaman		= $this->halaman;
  			$main_view		= 'v-asset-category/form';
  			$form_action	= 'asset_category/create';
  			$this->load->view('template', compact('main_view', 'form_action', 'input'));
  			return;
  		}

  		if ($this->asset_category->insert($input))
  		{
  			$this->session->set_flashdata('success', 'Okey.. New Category has been added..');
  		} else {
  			$this->session->set_flashdata('danger', 'Ups.. sorry something when wrong..');
  		}
  		redirect('asset_category');
  	}

	public function edit($id = null)
		{
			$category = $this->asset_category->where('sha1(id_assetcategory)', $id)->get();
			if (!$category) {
				$this->session->set_flashdata('warning', 'Sorry.. list hardware not found !');
				redirect('asset_category');
			}

			if (!$_POST) {
				$input = (object) $category;
			} else {
				$input = (object) $this->input->post(null, true);
			}
		//that something wrong
			if (!$this->asset_category->validate() || $this->form_validation->error_array()) {
				$halaman		= $this->halaman;
				$main_view		= 'v-asset-category/form';
				$form_action	= "asset_category/edit/$id";
				$this->load->view('template', compact('halaman', 'main_view', 'form_action', 'input'));
				return;
			}

			if ($this->asset_category->where('sha1(id_assetcategory)', $id)->update($input)) {
				$this->session->set_flashdata('info', 'Update date successfully..');
			} else {
				$this->session->set_flashdata('danger', 'Upss.. sorry that something wrong.. !');
			}
			redirect('asset_category');
		}

	public function delete($id = null)
		{
			$category = $this->asset_category->where('sha1(id_assetcategory)', $id)->get();
			if (!$category) {
				$this->session->set_flashdata('warning', 'Data not found in your database..');
				redirect('asset_category');
			}

			if ($this->asset_category->where('sha1(id_assetcategory)', $id)->delete()) {
				$this->session->set_flashdata('danger', 'Remove Data Successfully..');
			} else {
				$this->session->set_flashdata('danger', 'that is something wrong when remove this data, please check your database!');
			}
			redirect('asset_category');
		}

	public function search ($page = null)
		{
			$keywords		  	= $this->input->get('keywords', true);
			$asset_category	= $this->asset_category->where('asset_cat_name', $keywords)
																						->orLike('asset_cat_name', $keywords)
																						->paginate($page)
																						->getAll();
			$jml			    	= $this->asset_category->where('id_assetcategory', $keywords)
																						->orLike('asset_cat_name', $keywords)
																						->getAll();
			$jumlah 		  	= count($jml);
			$pagination 		= $this->asset_category->makePagination(site_url('asset_category/search/'), 3, $jumlah);
					if (!$asset_category) {
						$this->session->set_flashdata('warning', 'Sorry data not found..');
						redirect('asset_category');
					}
			$main_view	=	'v-asset-category/index';
			$this->load->view('template', compact('main_view', 'asset_category', 'pagination', 'jumlah'));

		}


}
