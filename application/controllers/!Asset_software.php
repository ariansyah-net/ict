<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Asset_software extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
			$this->load->model('Asset_software_model', 'asset_software', true);
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

      $asset_software	  	= $this->asset_software->join('lisence')
																								 ->joincoy('asset_category')
                                                 ->orderBy('id', 'desc')
                                                 ->paginate($page)
                                                 ->getAll();
      $jml 					= $this->asset_software->orderBy('id_assetcategory')->getAll();
      $jumlah 			= count($jml);
      $main_view 		= 'v-asset-software/index';
      $pagination 	= $this->asset_software->makePagination(site_url('asset_software'), 2, $jumlah);
      $this->load->view('template', compact('main_view', 'asset_software', 'pagination', 'jumlah'));
    }

		public function create() {
			if (!$_POST) {
				$input = (object) $this->asset_software->getDefaultValues();
			} else {
				$input = (object) $this->input->post(null, true);
			}
			if (!$this->asset_software->validate())
			{
				$main_view		= 'v-asset-software/form';
				$form_action	= 'asset_software/create';
				$this->load->view('template', compact('main_view', 'form_action', 'input'));
				return;
			}

			if ($this->asset_software->insert($input))
			{
				$this->session->set_flashdata('success', 'Okey.. New software has been added..');
			} else {
				$this->session->set_flashdata('danger', 'Ups.. sorry something when wrong..');
			}
			redirect('asset_software');
		}

		public function edit($id = null)
			{
				$software = $this->asset_software->where('sha1(id)', $id)->get();
				if (!$software) {
					$this->session->set_flashdata('warning', 'Sorry.. list Software not found !');
					redirect('asset_software');
				}

				if (!$_POST) {
					$input = (object) $software;
				} else {
					$input = (object) $this->input->post(null, true);
				}
				if (!$this->asset_software->validate() || $this->form_validation->error_array()) {
					$main_view		= 'v-asset-software/form';
					$form_action	= "asset_software/edit/$id";
					$this->load->view('template', compact('main_view', 'form_action', 'input'));
					return;
				}

				if ($this->asset_software->where('sha1(id)', $id)->update($input)) {
					$this->session->set_flashdata('info', 'Update date successfully..');
				} else {
					$this->session->set_flashdata('danger', 'Upss.. sorry that something wrong.. !');
				}
				redirect('asset_software');
			}

			public function delete($id = null)
				{
					$hardware = $this->asset_software->where('sha1(id)', $id)->get();
					if (!$hardware) {
						$this->session->set_flashdata('warning', 'Data not found in your database..');
						redirect('asset_software');
					}

					if ($this->asset_software->where('sha1(id)', $id)->delete()) {
						$this->session->set_flashdata('danger', 'Remove Data Successfully..');
					} else {
						$this->session->set_flashdata('danger', 'that is something wrong when remove this data, please check your database!');
					}
					redirect('asset_software');
				}

				public function search ($page = null)
			  	{
			  		$keywords		  	= $this->input->get('keywords', true);
			  		$asset_software	= $this->asset_software->join('lisence')
				                                           ->joincoy('asset_category')
																									 ->where('asset_cat_name', $keywords)
				                      										 ->orLike('sf_name', $keywords)
				                      										 ->paginate($page)
				                      										 ->getAll();
			  		$jml			    	= $this->asset_software->join('lisence')
																									 ->joincoy('asset_category')
				                                           ->where('id', $keywords)
				                      										 ->orLike('sf_name', $keywords)
				                      										 ->getAll();
			      $jumlah 		  	= count($jml);
			  		$pagination 		= $this->asset_software->makePagination(site_url('asset_software/search/'), 3, $jumlah);
			    			if (!$asset_software) {
			    				$this->session->set_flashdata('warning', 'Sorry data not found..');
			    				redirect('asset_software');
			    			}
			  		$main_view			=	'v-asset-software/index';
			  		$this->load->view('template', compact('main_view', 'asset_software', 'pagination', 'jumlah'));
			  	}

		//PRINT
		public function printall()
			{
					$assetsoftware	= $this->asset_software->printAll();
				 	$total 					= count($assetsoftware);

					$html  					= $this->load->view('v-asset-software/printAll', compact('assetsoftware', 'total'), true);
					require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");

					try {
						$html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('10', '5', '10', '0')); //left-top-right-bottom
						$html2pdf->WriteHTML($html);
						$html2pdf->pdf->SetTitle('Software Assets');
						$html2pdf->output('Asset-Software-list-'.date('Ymd').'.pdf');

					} catch (HTML2PDF_exception $e) {
						// echo($e);
						$this->session->set_flashdata('error', 'Sorry.. That Something wrong, please check before or contact your developer!');
						redirect('asset_software');
					}
			}

}
