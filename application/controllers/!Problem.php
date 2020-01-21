<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Problem extends MY_Controller
{

		public function __construct()
		{
			parent::__construct();
				$this->load->model('Problem_model', 'problem', true);
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
			$problem			= $this->problem->join('users', 'id_users')
																		->orderBy('id_problem', 'desc')
																		->paginate($page)->getAll();
			$jml 					= $this->problem->orderBy('id_problem')->getAll();

			$jumlah 			= count($jml);
			$main_view 		= 'v-problem/index';
			$pagination 	= $this->problem->makePagination(site_url('problem'), 2, $jumlah);
			$this->load->view('template', compact('main_view', 'problem', 'pagination', 'jumlah'));
		}

public function create()
		{
			if (!$_POST) {
				$input = (object) $this->problem->getDefaultValues();
			} else {
				$input = (object) $this->input->post(null, true);
			}

			if (!$this->problem->validate())
			{
				$main_view		= 'v-problem/form';
				$form_action	= 'problem/create';
				$this->load->view('template', compact('main_view', 'form_action', 'input'));
				return;
			}
				unset($input->search_user); //remove fake input
				unset($input->nama_user); //remove fake input
				unset($input->user); //remove fake input
				unset($input->other); //remove fake input

			if ($this->problem->insert($input))
			{
				$this->session->set_flashdata('success', 'Oke, Problem successfully added..');
			}else{
				$this->session->set_flashdata('danger', 'Ups.. something when wrong..');
			}
				redirect('problem');
		}

public function edit($id = null)
    {
        //$problem = $this->problem->where('sha1(id_problem)', $id)->get();
				$problem = $this->problem->where('sha1(id_problem)', $id)
 																 ->join('users', 'id_users')
																 ->get();
        if (!$problem) {
            $this->session->set_flashdata('warning', 'Sorry.. Data Problem Not Found !');
            redirect('problem');
        }
            if (!$_POST) {
                $input = (object) $problem;
            } else {
                $input = (object) $this->input->post(null, true);
            }

        if (!$this->problem->validate() || $this->form_validation->error_array()) {
                $main_view = 'v-problem/form';
                $form_action = "problem/edit/$id";
                $this->load->view('template', compact('main_view', 'form_action', 'input'));
                return;
                }
					unset($input->search_user); //remove fake input
					unset($input->nama_user); //remove fake input
					unset($input->user); //remove fake input
					unset($input->other); //remove fake input


        if ($this->problem->where('sha1(id_problem)', $id)->update($input)) {
            $this->session->set_flashdata('info', 'Update Successfully..');
        }else{
            $this->session->set_flashdata('danger', 'Uppss.. that something wrong..');
        }
          	redirect('problem');
    }

public function delete($id = null)
			{
				$prob = $this->problem->where('sha1(id_problem)', $id)->get();
					if (!$prob) {
						$this->session->set_flashdata('warning', 'Data not found in your database..');
						redirect('problem');
					}
						if ($this->problem->where('sha1(id_problem)', $id)->delete()) {
							$this->session->set_flashdata('danger', 'Okey.. Remove data successfully..');
						}else{
							$this->session->set_flashdata('danger', 'Happened mistake when remove this data, please contact your developer!');
					}
						redirect('problem');
			}

public function search ($page = null)
		{
			$keywords		= $this->input->get('keywords', true);
			$problem		= $this->problem->where('nama_user', $keywords)
																	->orLike('nama_user', $keywords)
																	->orLike('title_problem', $keywords)
																	->join('users', 'id_users')
																	->paginate($page)->getAll();
			$jml			 	= $this->problem->where('id_problem', $keywords)
																	->orLike('nama_user', $keywords)
																	->join('users', 'id_users')
																	->orderBy('users.id_users')
																	->getAll();
			$jumlah 		= count($jml);
			$pagination = $this->problem->makePagination(site_url('problem/search/'), 3, $jumlah);

				if (!$problem) {
					$this->session->set_flashdata('warning', 'Sorry.. Data not found !');
					redirect('problem');
				}
			$main_view	=	'v-problem/index';
			$this->load->view('template', compact('main_view', 'problem', 'pagination', 'jumlah'));
		}

//Get By Year period
public function getproblem($page = null)
		{
			$getselected 	= $this->input->get('keywords', TRUE); //for pagination
			$problem 			= $this->problem->join('users', 'id_users')
																		->where('period', $getselected)
																		->orLike('period', $getselected)
																		->paginate($page)->getAll();
			$jml 					= $this->problem->where('id_problem', $getselected)
																		->orLike('period', $getselected)
																		->getAll();
			$jumlah			  = count($jml);
			$pagination 	= $this->problem->makePagination(site_url('problem/getproblem/'), 3, $jumlah);

				if (!$problem) {
				$this->session->set_flashdata('warning', 'Sorry.. data not found!');
				redirect('problem');
				}
			$main_view 		= 'v-problem/index';
			$this->load->view('template', compact('main_view', 'problem', 'pagination', 'jumlah'));
		}

//Get By Year Result
public function getresult($page = null)
		{
			$getselected 	= $this->input->get('keywords', TRUE); //for pagination
			$problem 			= $this->problem->join('users', 'id_users')
																		->where('result', $getselected)
																		->orLike('result', $getselected)
																		->paginate($page)->getAll();
			$jml 					= $this->problem->where('id_problem', $getselected)
																		->orLike('result', $getselected)
																		->getAll();
			$jumlah			  = count($jml);
			$pagination 	= $this->problem->makePagination(site_url('problem/getproblem/'), 3, $jumlah);

				if (!$problem) {
				$this->session->set_flashdata('warning', 'Sorry.. data not found!');
				redirect('problem');
				}
			$main_view 		= 'v-problem/index';
			$this->load->view('template', compact('main_view', 'problem', 'pagination', 'jumlah'));
		}

public function user_auto_complete()
		{
			$keywords = $this->input->post('keywords');
			$usr = $this->problem->liveSearchUser($keywords);
				foreach ($usr as $pengguna)
				{
						//put in bold in written text.
						//$code_user = str_replace($keywords, '<strong>' .$keywords. '</strong>', $pengguna->code_user);
						$nama_user = preg_replace("#($keywords)#i", "<strong>$1</strong>", $pengguna->nama_user);
						//add new option
						$str  = '<li onclick="setItemPengguna(\''.$pengguna->nama_user.'\'); makeHiddenid(\''.$pengguna->id_users.'\')">';
						//$str .= "$code_user - $nama_user";
						$str .= "<i class='fa fa-user-o'></i> &nbsp; $nama_user";
						$str .= "</li>";
						echo $str;
				}
		}

//PRINT
public function printall()
	{
			$prob	 = $this->problem->printAll();
			$total = count($prob);

			$html  = $this->load->view('v-problem/printAllProblem', compact('prob', 'total'), true);
			require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");

			try {
				$html2pdf = new HTML2PDF('L', 'A4', 'en', true, 'UTF-8', array('10', '5', '10', '0')); //left-top-right-bottom
				$html2pdf->WriteHTML($html);
				$html2pdf->pdf->SetTitle('Problem user list');
				$html2pdf->output('problem-user-list-'.date('Ymd').'.pdf');

			} catch (HTML2PDF_exception $e) {
				// echo($e);
				$this->session->set_flashdata('error', 'Sorry.. That Something wrong, please check before or contact your developer!');
				redirect('problem');
			}
	}


}
