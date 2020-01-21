<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jobprogram extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
			$this->load->model('Jobprogram_model', 'jobprogram', true);
			$this->halaman = '<i class="fa fa-arrows-alt"></i> &nbsp; ICT Job Program';
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
		$jobprogram 	= $this->jobprogram->paginate($page)->orderBy('id_jobprogram', 'desc')->getAll();
		$jml 			= $this->jobprogram->getAll();

		$jumlah 		= count($jml);
		$halaman 		= $this->halaman;
		$main_view 		= 'v-jobprogram/index';
		$pagination 	= $this->jobprogram->makePagination(site_url('jobprogram'), 2, $jumlah);
		$this->load->view('template', compact('halaman', 'main_view', 'jobprogram', 'pagination', 'jumlah'));
	}


	public function create()
	{
		if (!$_POST) {
			$input = (object) $this->jobprogram->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
		}

		if (!$this->jobprogram->validate())
		{
			$halaman 		= $this->halaman;
			$main_view		= 'v-jobprogram/form';
			$form_action	= 'jobprogram/create';
			$this->load->view('template', compact('halaman', 'main_view', 'form_action', 'input'));
			return;
		}

		if ($this->jobprogram->insert($input))
		{
			$this->session->set_flashdata('info', 'New Job Program successfully added.');
		} else {
			$this->session->set_flashdata('danger', 'Uppss.. that is something wrong when insert this data, please check your database!');
		}
			redirect('jobprogram');
	}


public function edit($id = null)
    {
        $jobprogram = $this->jobprogram->where('sha1(id_jobprogram)', $id)->get();
        if (!$jobprogram) {
            $this->session->set_flashdata('warning', 'Sorry.. Data not found in your database!');
            redirect('jobprogram');
        }

            if (!$_POST) {
                $input = (object) $jobprogram;

            } else {
                $input = (object) $this->input->post(null, true);
            }

        if (!$this->jobprogram->validate() || $this->form_validation->error_array()) {

                $halaman = $this->halaman;
                $main_view = 'v-jobprogram/form';
                $form_action = "jobprogram/edit/$id";
                $this->load->view('template', compact('halaman', 'main_view', 'form_action', 'input'));
                return;
                }

        //update data
        if ($this->jobprogram->where('sha1(id_jobprogram)', $id)->update($input)) {
            $this->session->set_flashdata('info', 'Update Data Successfully..');
        } else {
            $this->session->set_flashdata('danger', 'Ups.. Something when wrong..');
        }
          redirect('jobprogram');
    }


    public function delete($id = null)
	{
		$program = $this->jobprogram->where('sha1(id_jobprogram)', $id)->get();
		if (!$program) {
			$this->session->set_flashdata('warning', 'Data not found in your database..');
			redirect('jobprogram');
		}

		if ($this->jobprogram->where('sha1(id_jobprogram)', $id)->delete()) {
			$this->session->set_flashdata('danger', 'Remove Data Successfully..');
		} else {
			$this->session->set_flashdata('danger', 'that is something wrong when remove this data, please check your database!');
		}
		redirect('jobprogram');
	}


	public function get_period($page = null) {

		$year 			= $this->input->get('selected');
		$jobprogram 	= $this->jobprogram->where('period', $year)
																		 ->orLike('id_jobprogram', 'id_jobprogram')
																		 ->orderBy('jobprogram.id_jobprogram')
																		 ->paginate($page)->getAll();
		$jml 				= $this->jobprogram->where('id_jobprogram', $year)
																	 ->orLike('period', $year)
																	 ->getAll();
		$jumlah			= count($jml);
		$pagination = $this->jobprogram->makePagination(site_url('jobprogram/get_period/'), 3, $jumlah);

				if (!$jobprogram) {
				$this->session->set_flashdata('warning', 'Sorry.. data not found!');
				redirect('jobprogram');
				}
		$halaman 		= $this->halaman;
		$main_view 	= 'v-jobprogram/index';
		$this->load->view('template', compact('halaman', 'main_view', 'jobprogram', 'pagination', 'jumlah'));
	}


	public function get_status($page = null)
	{
		$year 			= $this->input->get('selected');
		$jobprogram = $this->jobprogram->where('status', $year)
																	 ->orLike('id_jobprogram', 'id_jobprogram')
																	 ->orderBy('jobprogram.id_jobprogram')
																	 ->paginate($page)
																	 ->getAll();
		$jml 			= $this->jobprogram->where('id_jobprogram', $year)
																 ->orLike('status', $year)
																 ->getAll();

		$jumlah			= count($jml);
		$pagination = $this->jobprogram->makePagination(site_url('jobprogram/get_status/'), 3, $jumlah);

			if (!$jobprogram) {
			$this->session->set_flashdata('warning', 'Sorry.. data not found!');
			redirect('jobprogram');
			}

		$halaman 		= $this->halaman;
		$main_view 		= 'v-jobprogram/index';
		$this->load->view('template', compact('halaman', 'main_view', 'jobprogram', 'pagination', 'jumlah'));
	}

	public function searchkeywords($page = null)
    {
        $keywords   = $this->input->get('keywords', true);
        $jobprogram   = $this->jobprogram->where('target', $keywords)
                                  ->orLike('target', $keywords)
                                  ->paginate($page)
                                  ->getAll();
        $jml        = $this->jobprogram->where('id_jobprogram', $keywords)
                                  ->orLike('target', $keywords)
                                  ->getAll();
        $jumlah     = count($jml);
        $pagination = $this->jobprogram->makePagination(site_url('jobprogram/searchkeywords/'), 3, $jumlah);

            if (!$jobprogram) {
                $this->session->set_flashdata('danger', 'Uppss.. data does not fit in database, please write the word specific. ');
                redirect('jobprogram');
            }
        $halaman    = $this->halaman;
        $main_view  = 'v-jobprogram/index';
        $this->load->view('template', compact('halaman', 'main_view', 'jobprogram', 'pagination', 'jumlah'));
    }

}
