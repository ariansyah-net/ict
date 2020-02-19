<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Computers extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
			$this->load->model('Computers_model', 'computers', true);
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
		/*
		$computers 		= $this->computers->paginate($page)->orderBy('id_computers', 'desc')->getAll();
		$jml 					= $this->computers->getAll();
		*/

		$computers	  = $this->computers->join('users')
										->orderBy('id_computers', 'desc')
										->paginate($page)->getAll();
		$jml 					= $this->computers->orderBy('id_computers')->getAll();


		$jumlah 			= count($jml);
		$main_view 		= 'v-computers/index';
		$pagination 	= $this->computers->makePagination(site_url('computers'), 2, $jumlah);
		$this->load->view('template', compact('halaman', 'main_view', 'computers', 'pagination', 'jumlah'));
	}


	public function create()
	{
		if (!$_POST) {
			$input = (object) $this->computers->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
		}

		if (!$this->computers->validate())
		{
			$halaman 		= $this->halaman;
			$main_view		= 'v-computers/form';
			$form_action	= 'computers/create';
			$this->load->view('template', compact('halaman', 'main_view', 'form_action', 'input'));
			return;
		}

		unset($input->nama_user); //remove fake input
		unset($input->search_compac); //remove fake input

		if ($this->computers->insert($input))
		{
			$this->session->set_flashdata('success', 'Oke.. New Computer Has Been Added..');
		} else {
			$this->session->set_flashdata('danger', 'Ups.. Something when wrong..');
		}
			redirect('computers');
	}

 public function edit($id = null)
    {
        //$computers = $this->computers->where('sha1(id_computers)', $id)->get();
				$computers = $this->computers->where('sha1(id_computers)', $id)
			                               ->join('users', 'id_users')
			                               ->get();
        if (!$computers) {
            $this->session->set_flashdata('warning', 'Sorry.. Data User Not Found !');
            redirect('computers');
        }

            if (!$_POST) {
                $input = (object) $computers;

            } else {
                $input = (object) $this->input->post(null, true);
            }

        if (!$this->computers->validate() || $this->form_validation->error_array()) {

                $main_view = 'v-computers/form';
                $form_action = "computers/edit/$id";
                $this->load->view('template', compact('main_view', 'form_action', 'input'));
                return;
                }

				unset($input->search_compac); //remove fake input
	          unset($input->nama_user); //remove fake input

        if ($this->computers->where('sha1(id_computers)', $id)->update($input)) {
            $this->session->set_flashdata('info', 'Update Successfully..');
        } else {
            $this->session->set_flashdata('danger', 'Ups.. Something when wrong..');
        }
          redirect('computers');
    }


	public function delete($id = null)
	{
		$specs = $this->computers->where('sha1(id_computers)', $id)->get();
		if (!$specs) {
			$this->session->set_flashdata('warning', 'Data not found in your database..');
			redirect('computers');
		}

		if ($this->computers->where('sha1(id_computers)', $id)->delete()) {
			$this->session->set_flashdata('danger', 'Remove Successfully..');
		} else {
			$this->session->set_flashdata('danger', 'Terjadi kesalahan saat menghapus data..');
		}
		redirect('computers');
	}

	public function search ($page = null)
	{
		$keywords		= $this->input->get('keywords', true);
		$computers	= $this->computers->join('users')
																	->where('ipaddress', $keywords)
																	->orLike('nama_user', $keywords)
																	->paginate($page)
																	->getAll();
		$jml				= $this->computers->join('users')
																	->where('id_computers', $keywords)
																	->orLike('ipaddress', $keywords)
																	->getAll();
		$jumlah 		= count($jml);
		$pagination = $this->computers->makePagination(site_url('computers/search/'), 3, $jumlah);

			if (!$computers) {
				$this->session->set_flashdata('warning', 'Sorry data not found..');
				redirect('computers');
			}
		$halaman	=	$this->halaman;
		$main_view	=	'v-computers/index';
		$this->load->view('template', compact('halaman', 'main_view', 'computers', 'pagination', 'jumlah'));

	}

	public function ip_unique()
	{
		$computers = $this->input->post('ipaddress');
		$id_computers = $this->input->post('id_computers');

		$this->computers->where('ipaddress', $computers);
		!$id_computers || $this->computers->where('id_computers !=', $id_computers);
		$computers = $this->computers->get();

			if(count($computers)) {
				$this->form_validation->set_message('ip_unique', 'Khmm.. %s already exist.');
				return false;
			}
			return true;
	}

	public function codeuser_unique()
	{
		$specs = $this->input->post('code_user');
		$id_computers = $this->input->post('id_computers');

		$this->computers->where('code_user', $specs);
		!$id_computers || $this->computers->where('id_computers !=', $id_computers);
		$computers = $this->computers->get();

		if(count($computers)) {
			$this->form_validation->set_message('codeuser_unique', 'Khmm.. %s already exist.');
			return false;
		}

		return true;
	}

	public function mac_unique()
	{
		$specs = $this->input->post('macaddress');
		$id_computers = $this->input->post('id_computers');

		$this->computers->where('macaddress', $specs);
		!$id_computers || $this->computers->where('id_computers !=', $id_computers);
		$computers = $this->computers->get();

		if(count($computers)) {
			$this->form_validation->set_message('mac_unique', 'Khmm.. %s already exist.');
			return false;
		}

		return true;
	}

	public function code_unique()
	{
		$specs = $this->input->post('codefication');
		$id_computers = $this->input->post('id_computers');

		$this->computers->where('codefication', $specs);
		!$id_computers || $this->computers->where('id_computers !=', $id_computers);
		$computers = $this->computers->get();

		if(count($computers)) {
			$this->form_validation->set_message('code_unique', 'Khmm.. %s already exist.');
			return false;
		}

		return true;
	}

	public function user_auto_complete()
    {
        $keywords = $this->input->post('keywords');
        $usr		 	= $this->computers->liveSearchUser($keywords);

            foreach ($usr as $computers) {
                //put in bold in written text.
                $code_user = str_replace($keywords, '<strong>'.$keywords.'</strong>', $computers->code_user);
                $nama_user = preg_replace("#($keywords)#i", "<strong>$1</strong>", $computers->nama_user);

                //add new option
                $str  = '<li onclick="setItemUser(\''.$computers->nama_user.'\'); makeHiddenIdCompac(\''.$computers->id_users.'\')">';
                $str .= "$code_user - $nama_user";
                $str .= "</li>";

                echo $str;
            }
    }

    public function searchcode ($page = null)
		{
			$code				= $this->input->get('code', true);
			$computers	= $this->computers->join('users')
																		->where('codefication', $code)
																		->orLike('codefication', $code)
																		->paginate($page)
																		->getAll();
			$jml				= $this->computers->join('users')
																		->where('id_computers', $code)
																		->orLike('codefication', $code)
																		->getAll();
			$jumlah 		= count($jml);
			$pagination = $this->computers->makePagination(site_url('computers/searchcode/'), 3, $jumlah);

				if (!$computers) {
					$this->session->set_flashdata('warning', 'Sorry, data not found in your database! ');
					redirect('computers/codefications');
			}
		$halaman	=	$this->halaman;
		$main_view	=	'v-computers/codefication';
		$this->load->view('template', compact('halaman', 'main_view', 'computers', 'pagination', 'jumlah'));

	}

 	public function codefications($page = null)
    {
		$computers	  = $this->computers->join('users')
																		->orderBy('id_computers', 'desc')
																		->paginate($page)->getAll();
		$jml 					= $this->computers->getAll();

		$jumlah 			= count($jml);
		$main_view 		= 'v-computers/codefication';
		$pagination 	= $this->computers->makePagination(site_url('computers/codefications'), 3, $jumlah);
		$this->load->view('template', compact('main_view', 'computers', 'pagination', 'jumlah'));
    }


/*========= PRINT ============*/

	public function print_spec($id = null)
	{
		//$spec = $this->computers->where('id_computer', $id)->join('users')->get();
		//$spec 	= $this->computers->where('sha1(id_computers)', $id)->get();

		$spec	  = $this->computers->join('users')
															->where('sha1(id_computers)', $id)->get();

			if (!$spec) {
				$this->session->set_flashdata('warning', 'Data tidak tersedia..');
				redirect('computers');
			} else {

			$html = $this->load->view('v-computers/print_pdf', compact('spec'), true);
			}
		require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");

		try {
			$html2pdf = new HTML2PDF('P', 'Latter', 'en', true, 'UTF-8', array('10', '20', '10', '5'));
			$html2pdf->WriteHTML($html);
			$html2pdf->output('report_computer_'.date('Ymd').'.pdf');

		} catch (HTML2PDF_exception $e) {
			// echo($e);
			$this->session->set_flashdata('error', 'Maaf, Terjadi kendala teknis..');
			redirect('computers'); //back to function.
		}

	}


	public function print_all_pc_codefication()
	{
		$code		= $this->computers->print_codefications_model();
		$total	= count($code);
		$html 	= $this->load->view('v-computers/print_all_codefications', compact('code', 'total'), true);

		require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");

		try {
			$html2pdf = new HTML2PDF('L', 'A5', 'en', true, 'UTF-8', array('10', '10', '10', '10')); //left-top-right-bottom
			$html2pdf->WriteHTML($html);
			$html2pdf->pdf->SetTitle('All Codefications');
			$html2pdf->output('Computer_Codefications'.date('Ymd').'.pdf');

		} catch (HTML2PDF_exception $e) {
			// echo($e);
			$this->session->set_flashdata('error', 'Sorry.. That Something wrong, please check before or contact your developer!');
			redirect('computers/codefications');
		}
	}

	public function print_codefications($id = null)
	{

		$code	  = $this->computers->join('users')
															->where('sha1(id_computers)', $id)->get();
			if (!$code) {
				$this->session->set_flashdata('warning', 'Data Not Found !');
				redirect('computers/codefications');
			} else {

			$html = $this->load->view('v-computers/print_codefications', compact('code'), true);
			}
		require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");

		try {
			$html2pdf = new HTML2PDF('P', 'Latter', 'en', true, 'UTF-8', array('10', '10', '10', '5'));
			$html2pdf->WriteHTML($html);
			$html2pdf->pdf->SetTitle('Personal Codefications');
			$html2pdf->output('codefications_'.date('Ymd').'.pdf');
		} catch (HTML2PDF_exception $e) {
			// echo($e);
			$this->session->set_flashdata('error', 'Sorry.. Something when wrong, please contact your root administrator!');
			redirect('computers/codefications'); //back to function.
		}

	}


}
