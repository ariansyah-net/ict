<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Asset_hardware extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
			$this->load->model('Asset_hardware_model', 'asset_hardware', true);
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

		$asset_hardware	  	= $this->asset_hardware->join('room')
																							 ->join('users')
																							 ->joincoy('asset_category')
																							 ->orderBy('id_hardware', 'desc')
																						 	 ->paginate($page)
																							 ->getAll();
		$jml 					= $this->asset_hardware->orderBy('id_assetcategory')->getAll();
		$jumlah 			= count($jml);
		$main_view 		= 'v-asset-hardware/index';
		$pagination 	= $this->asset_hardware->makePagination(site_url('asset_hardware'), 2, $jumlah);
		$this->load->view('template', compact('main_view', 'asset_hardware', 'pagination', 'jumlah'));
	}


	public function create()
	{
		if (!$_POST) {
			$input = (object) $this->asset_hardware->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
		}
		if (!$this->asset_hardware->validate())
		{
			$main_view		= 'v-asset-hardware/form';
			$form_action	= 'asset_hardware/create';
			$this->load->view('template', compact('main_view', 'form_action', 'input'));
			return;
		}

		if ($this->asset_hardware->insert($input))
		{
			$this->session->set_flashdata('success', 'Okey.. New hardware has been added..');
		} else {
			$this->session->set_flashdata('danger', 'Ups.. sorry something when wrong..');
		}
		redirect('asset_hardware');
	}

	public function edit($id = null)
		{
			$hardware = $this->asset_hardware->where('sha1(id_hardware)', $id)->get();
			if (!$hardware) {
				$this->session->set_flashdata('warning', 'Sorry.. list hardware not found !');
				redirect('asset_hardware');
			}

			if (!$_POST) {
				$input = (object) $hardware;
			} else {
				$input = (object) $this->input->post(null, true);
			}
		//that something wrong
			if (!$this->asset_hardware->validate() || $this->form_validation->error_array()) {
				$main_view		= 'v-asset-hardware/form';
				$form_action	= "asset_hardware/edit/$id";
				$this->load->view('template', compact('main_view', 'form_action', 'input'));
				return;
			}

			if ($this->asset_hardware->where('sha1(id_hardware)', $id)->update($input)) {
				$this->session->set_flashdata('info', 'Update date successfully..');
			} else {
				$this->session->set_flashdata('danger', 'Upss.. sorry that something wrong.. !');
			}
			redirect('asset_hardware');
		}

	public function delete($id = null)
		{
			$hardware = $this->asset_hardware->where('sha1(id_hardware)', $id)->get();
			if (!$hardware) {
				$this->session->set_flashdata('warning', 'Data not found in your database..');
				redirect('asset_hardware');
			}

			if ($this->asset_hardware->where('sha1(id_hardware)', $id)->delete()) {
				$this->session->set_flashdata('danger', 'Remove Data Successfully..');
			} else {
				$this->session->set_flashdata('danger', 'that is something wrong when remove this data, please check your database!');
			}
			redirect('asset_hardware');
		}

	public function search ($page = null)
  	{
  		$keywords		  	= $this->input->get('keywords', true);
  		$asset_hardware	= $this->asset_hardware->join('room')
																						 ->join('users')
                                             ->joincoy('asset_category')
                                             ->where('hw_name', $keywords)
                      											 ->orLike('hw_type', $keywords)
                      											 ->paginate($page)
                      											 ->getAll();
  		$jml			    	= $this->asset_hardware->join('room')
                                             ->joincoy('asset_category')
                                             ->where('id_hardware', $keywords)
                      											 ->orLike('hw_name', $keywords)
                      											 ->getAll();
      $jumlah 		  	= count($jml);
  		$pagination 		= $this->asset_hardware->makePagination(site_url('asset_hardware/search/'), 3, $jumlah);
    			if (!$asset_hardware) {
    				$this->session->set_flashdata('warning', 'Sorry data not found..');
    				redirect('asset_hardware');
    			}
  		$main_view			=	'v-asset-hardware/index';
  		$this->load->view('template', compact('main_view', 'asset_hardware', 'pagination', 'jumlah'));
  	}

		//PRINT
		public function printall()
			{
					$assethardware	= $this->asset_hardware->printAll();
					$total 					= count($assethardware);

					$html  					= $this->load->view('v-asset-hardware/printAll', compact('assethardware', 'total'), true);
					require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");

					try {
						$html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('10', '5', '10', '0')); //left-top-right-bottom
						$html2pdf->WriteHTML($html);
						$html2pdf->pdf->SetTitle('Hardware Asset');
						$html2pdf->output('Asset-Hardware-list-'.date('Ymd').'.pdf');

					} catch (HTML2PDF_exception $e) {
						// echo($e);
						$this->session->set_flashdata('error', 'Sorry.. That Something wrong, please check before or contact your developer!');
						redirect('asset_hardware');
					}
			}



			public function codefication_unique()
			{
				$asset_hardware = $this->input->post('hw_codefication');
				$id_hardware = $this->input->post('id_hardware');

				$this->asset_hardware->where('hw_codefication', $asset_hardware);
				!$id_hardware || $this->asset_hardware->where('id_hardware !=', $id_hardware);
				$asset_hardware = $this->asset_hardware->get();

					if(count($asset_hardware)) {
						$this->form_validation->set_message('codefication_unique', 'Khmm.. %s already exist.');
						return false;
					}
					return true;
			}

			public function codefications($page = null)
		    {
				$asset_hardware	  = $this->asset_hardware->join('room')
																								 ->join('users')
																								 ->joincoy('asset_category')
																								 ->orderBy('id_hardware', 'desc')
																								 ->paginate($page)->getAll();
				$jml 					= $this->asset_hardware->getAll();

				$jumlah 			= count($jml);
				$main_view 		= 'v-asset-hardware/codefication';
				$pagination 	= $this->asset_hardware->makePagination(site_url('asset_hardware/codefications'), 3, $jumlah);
				$this->load->view('template', compact('main_view', 'asset_hardware', 'pagination', 'jumlah'));
		    }

			public function print_codefications($id = null)
			{

				$code	  = $this->asset_hardware->join('users')
																			 ->where('sha1(id_hardware)', $id)->get();
					if (!$code) {
						$this->session->set_flashdata('warning', 'Data Not Found !');
						redirect('asset_hardware/codefications');
					} else {

					$html = $this->load->view('v-asset-hardware/print_codefications', compact('code'), true);
					}
				require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");

				try {
					$html2pdf = new HTML2PDF('P', 'Latter', 'en', true, 'UTF-8', array('10', '10', '10', '5'));
					$html2pdf->WriteHTML($html);
					$html2pdf->pdf->SetTitle('Hardware Codefications');
					$html2pdf->output('codefications_'.date('Ymd').'.pdf');
				} catch (HTML2PDF_exception $e) {
					// echo($e);
					$this->session->set_flashdata('error', 'Sorry.. Something when wrong, please contact your root administrator!');
					redirect('asset_hardware/codefications'); //back to function.
				}

			}

			public function print_all_hw_codefication()
			{
				$code		= $this->asset_hardware->print_codefications_model();
				$total	= count($code);
				$html 	= $this->load->view('v-asset-hardware/print_all_codefications', compact('code', 'total'), true);

				require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");

				try {
					$html2pdf = new HTML2PDF('P', 'A5', 'en', true, 'UTF-8', array('10', '10', '10', '10')); //left-top-right-bottom
					$html2pdf->WriteHTML($html);
					$html2pdf->pdf->SetTitle('All Hardware Codefications');
					$html2pdf->output('Hardware_Codefications'.date('Ymd').'.pdf');

				} catch (HTML2PDF_exception $e) {
					// echo($e);
					$this->session->set_flashdata('error', 'Sorry.. That Something wrong, please check before or contact your developer!');
					redirect('asset_hardware/codefications');
				}
			}

}
