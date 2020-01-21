<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Computertypes extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Computertypes_model', 'computertypes', true);
    	$this->halaman = '<i class="panel-title fa fa-gear"></i> Configuration <i class="panel-title fa fa-angle-double-right"></i> Computer Types';
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

		if (!$_POST) {
			$input = (object) $this->computertypes->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
		}

		if (!$this->computertypes->validate())
		{
			$computertypes 	= $this->computertypes->paginate($page)->orderBy('id_type', 'desc')->getAll();
			$jml        	= $this->computertypes->getAll();

			$jumlah     	= count($jml);
			$halaman 		= $this->halaman;
			$main_view		= 'v-computer-types/index';
			$form_action	= 'computertypes';
        	$pagination 	= $this->computertypes->makePagination(site_url('computertypes'), 2, $jumlah);

			$this->load->view('template', compact('halaman', 'main_view', 'computertypes', 'pagination', 'jumlah', 'form_action', 'input'));
			return;
		}

		if ($this->computertypes->insert($input))
		{
			$this->session->set_flashdata('info', 'Oke, Data successfully added..');
		} else {
			$this->session->set_flashdata('danger', 'Uppss.. there is wrong when insert this data..');
		}
			redirect('computertypes');
    }


	public function edit($id, $page = null)
	{
		$computertypes = $this->computertypes->where('sha1(id_type)', $id)->get();
		if(!$computertypes) {
			$this->session->set_flashdata('warning', 'Uppss.. there is no data to displayed..');
			redirect('computertypes');
		}
			if(!$_POST) {
				$input = (object) $computertypes;
			} else {
				$input = (object) $this->input->post(null, true);
			}

		if (!$this->computertypes->validate() || $this->form_validation->error_array()) {

			$computertypes = $this->computertypes->paginate($page)->getAll();
			$jml        	= $this->computertypes->getAll();

			$jumlah     	= count($jml);
			$main_view		= 'v-computer-types/index';
			$form_action	= "computertypes/edit/$id";
    	$pagination 	= $this->computertypes->makePagination(site_url('computertypes'), 2, $jumlah);

			$this->load->view('template', compact('main_view', 'computertypes', 'pagination', 'jumlah', 'form_action', 'input'));
			return;
		}

		if ($this->computertypes->where('sha1(id_type)', $id)->update($input)){
			$this->session->set_flashdata('info', 'Update data successfully..');
		} else {
			$this->session->set_flashdata('danger', 'Upss.. there is wrong when update this data, please check your database!');
		}
		redirect('computertypes');
	}


	public function delete($id = null)
	{
		$computertypes = $this->computertypes->where('sha1(id_type)', $id)->get();
		if (!$computertypes) {
			$this->session->set_flashdata('warning', 'Upss.. there is no data to displayed..');
			redirect('computertypes');
		}

		if ($this->computertypes->where('sha1(id_type)', $id)->delete()) {
			$this->session->set_flashdata('success', 'Remove data successfully..');
		} else {
			$this->session->set_flashdata('danger', 'Uppss.. there is wrong when remove this data, please check your database!');
		}
		redirect('computertypes');
	}

	public function type_unique()
	{
		$computertypes = $this->input->post('nama_type');
		$id_type = $this->input->post('id_type');

		$this->computertypes->where('nama_type', $computertypes);
		!$id_type || $this->computertypes->where('id_type !=', $id_type);
		$computertypes = $this->computertypes->get();

		if(count($computertypes)) {
			$this->form_validation->set_message('type_unique', 'Khmm.. %s is already.');
			return false;
		}

		return true;
	}

	public function searchkeywords($page = null)
	{
		if(!$_POST) {
			$input	= (object) $this->computertypes->getDefaultValues();
		} else {
			$input	= (object) $this->input->post(null, true);
		}

		if (!$this->computertypes->validate()) {
			$keywords		=	$this->input->get('keywords', true);
			$computertypes 	=	$this->computertypes->where('nama_type', $keywords)
													->orLike('nama_type', $keywords)
													->paginate($page)
													->getAll();
			$jml 			= 	$this->computertypes->where('id_type', $keywords)
													->orLike('nama_type', $keywords)
													->getAll();
			$jumlah			= 	count($jml);
			$pagination 	=	$this->computertypes->makePagination(site_url('computertypes/searchkeywords/'), 3, $jumlah);

				if (!$computertypes) {
					$this->session->set_flashdata('warning', 'Uppss.. sorry data not found !');
					redirect('computertypes');
				}
			$halaman 		=  $this->halaman;
			$main_view		= 'v-computer-types/index';
			$form_action 	= 'computertypes';
			$this->load->view('template', compact('halaman', 'main_view', 'computertypes', 'pagination', 'jumlah', 'form_action', 'input'));
			return;
		}

		if ($this->computertypes->insert($input))
		{
			$this->session->set_flashdata('success', 'New Computer Types successfully added..');
		} else {
			$this->session->set_flashdata('danger', 'Uppss.. there is wrong when insert this data, please check your database!');
		}
			redirect('computertypes');
	}



}
