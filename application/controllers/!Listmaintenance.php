<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Listmaintenance extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('listmaintenance_model', 'listmaintenance', true);
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
        //$listmaintenance   = $this->listmaintenance->paginate($page)->getAll();
/*      $list       = $this->listmaintenance->joincoy('computers')
                                            ->orderBy('computers.id_users')->orderBy('codefication')
                                            ->paginate($page)->orderBy('l_id_list', 'desc')->getAll();

        $jml        = $this->listmaintenance->joincoy('computers')
                                            ->orderBy('computers.id_users')
                                            ->orderBy('codefication')->getAll();
*/
        // $keywords		= $this->input->get('keywords', true);
        $list			  = $this->listmaintenance->join('users')
                                            ->joincoy('computers')
                                            ->orderBy('l_id_list', 'desc')
                                            // ->joinRom('room')

                                            ->paginate($page)
                                            ->getAll();
        $jml 				= $this->listmaintenance->orderBy('l_id_list')
                                            ->getAll();
        $jumlah     = count($jml);
        $main_view  = 'v-listmaintenance/index';
        $pagination = $this->listmaintenance->makePagination(site_url('listmaintenance/index'), 3, $jumlah);
        $this->load->view('template', compact('main_view', 'list', 'pagination', 'jumlah'));
    }

    public function create()
    {
        if (!$_POST) {
            $input = (object) $this->listmaintenance->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->listmaintenance->validate())
        {
            $main_view      = 'v-listmaintenance/form';
            $form_action    = 'listmaintenance/create';

            $this->load->view('template', compact('main_view', 'form_action', 'input'));
            return;
        }
        unset($input->nama_user); //remove fake input
        unset($input->search_lmuac); //remove fake input

        if ($this->listmaintenance->insert($input))
          {
            $this->session->set_flashdata('success', 'List Maintenance successfully added..');
          } else {
            $this->session->set_flashdata('danger', 'Uppss.. there is wrong when insert this data, please check your database.');
          }
            redirect('listmaintenance');
    }


    public function edit($id, $page = null)
    {
      //$listmaintenance = $this->listmaintenance->where('sha1(l_id_list)', $id)->get();

        $listmaintenance = $this->listmaintenance->where('sha1(l_id_list)', $id)
                               ->join('users', 'id_users')
                               ->get();
        if(!$listmaintenance) {
            $this->session->set_flashdata('warning', 'Sorry, there is no data for displayed.');
            redirect('listmaintenance');
        }
            if(!$_POST) {
                $input = (object) $listmaintenance;
            } else {
                $input = (object) $this->input->post(null, true);
            }

        if (!$this->listmaintenance->validate() || $this->form_validation->error_array()) {

            $listmaintenance           = $this->listmaintenance->paginate($page)->getAll();
            $jml            = $this->listmaintenance->getAll();

            $jumlah         = count($jml);
            $main_view      = 'v-listmaintenance/form';
            $form_action    = "listmaintenance/edit/$id";
            $pagination     = $this->listmaintenance->makePagination(site_url('listmaintenance'), 2, $jumlah);

            $this->load->view('template', compact('main_view', 'listmaintenance', 'pagination', 'jumlah', 'form_action', 'input'));
            return;
        }

        unset($input->search_lmuac); //remove fake input
        unset($input->nama_user); //remove fake input

        if ($this->listmaintenance->where('sha1(l_id_list)', $id)->update($input)){
            $this->session->set_flashdata('info', 'Update data successfully..');
        } else {
            $this->session->set_flashdata('danger', 'Uppss.. there is wrong when Update this data, please check your database.');
        }
        redirect('listmaintenance');
    }


    public function delete($id = null)
    {
        $listmaintenance = $this->listmaintenance->where('sha1(l_id_list)', $id)->get();
        if (!$listmaintenance) {
            $this->session->set_flashdata('warning', 'Sorry, there is no data for displayed.');
            redirect('listmaintenance');
        }

        if ($this->listmaintenance->where('sha1(l_id_list)', $id)->delete()) {
            $this->session->set_flashdata('info', 'Remove data successfully..');
        } else {
            $this->session->set_flashdata('danger', 'Uppss.. there is wrong when remove this data, please check your database.');
        }
        redirect('listmaintenance');
    }


    public function deleteselected() {
      foreach ($_POST['l_id_list'] as $id) {
        $this->listmaintenance->selected($id);
      }
      $this->session->set_flashdata('success', 'Remove data successfully..');
      return redirect('listmaintenance');
    }

    public function user_auto_complete()
  		{
  			$keywords  = $this->input->post('keywords');
  			$usr       = $this->listmaintenance->liveSearchUser($keywords);
				foreach ($usr as $user)
  				{
  						$code_user = str_replace($keywords, '<strong>' .$keywords. '</strong>', $user->code_user);
  						$nama_user = preg_replace("#($keywords)#i", "<strong>$1</strong>", $user->nama_user);
  						$str  = '<li onclick="setItemlmuac(\''.$user->nama_user.'\'); makeHiddenIdlmuac(\''.$user->id_users.'\')">';
  						$str .= "$code_user <i class='fa fa-gg'></i> $nama_user";
  						//$str .= "<i class='fa fa-user-o'></i> &nbsp; $nama_user";
  						$str .= "</li>";
  						echo $str;
  				}
  		}


    public function search ($page = null)
  	{
  		$keywords		  = $this->input->get('keywords', true);
  		$list	        = $this->listmaintenance->join('users')
                                            // ->join('room')
                                            ->joincoy('computers')
                                            ->where('nama_user', $keywords)
                      											->orLike('nama_user', $keywords)
                      											->paginate($page)
                      											->getAll();
  		$jml			    = $this->listmaintenance->join('users')
                                            ->joincoy('computers')
                                            ->where('l_id_list', $keywords)
                      											->orLike('nama_user', $keywords)
                      											->getAll();
      $jumlah 		  = count($jml);
  		$pagination 	= $this->listmaintenance->makePagination(site_url('listmaintenance/search'), 2, $jumlah);
    			if (!$list) {
    				$this->session->set_flashdata('warning', 'Sorry data not found..');
    				redirect('listmaintenance');
    			}
  		$main_view	=	'v-listmaintenance/index';
  		$this->load->view('template', compact('main_view', 'list', 'pagination', 'jumlah'));
  	}




    public function getroom ($page = null)
    {
      $keywords		  = $this->input->get('selected3', true);
      $list	        = $this->listmaintenance->join('users')
                                            // ->join('room')
                                            ->where('room_name', $keywords)
                                            ->joincoy('computers')
                                            // ->where('nama_user', $keywords)
                                            ->orLike('nama_user', $keywords)
                                            ->paginate($page)
                                            ->getAll();
      $jml			    = $this->listmaintenance->join('users')
                                            ->joincoy('computers')
                                            ->where('l_id_list', $keywords)
                                            ->orLike('nama_user', $keywords)
                                            ->getAll();
      $jumlah 		  = count($jml);
      $pagination 	= $this->listmaintenance->makePagination(site_url('listmaintenance/getroom'), 2, $jumlah);
          if (!$list) {
            $this->session->set_flashdata('warning', 'Sorry data not found..');
            redirect('listmaintenance');
          }
      $main_view	=	'v-listmaintenance/index';
      $this->load->view('template', compact('main_view', 'list', 'pagination', 'jumlah'));
    }



          //
          //
          //
          //
          // //this function for double combo selected
          // public function getroom($page = null) {
          //
          //     $select3  = $this->input->get('keywords', TRUE);
          //     $list   = $this->listmaintenance->where('l_id_list', $select3)
          //                                     ->join('users')
          //                                     // ->orLike('id_users', $select3)
          //                                     // ->join('users')
          //                                     // ->join('room')
          //                                     ->joincoy('computers')
          //                                     // ->orderBy('room.id_room', 'ASC')
          //                                     ->paginate($page)
          //                                     ->getAll();
          //     $jml    = $this->listmaintenance->where('id_users', $select3)
          //                                     // ->orderBy('listmaintenance.l_id_list')
          //                                     ->getAll();
          //
          //     $jumlah = count($jml);
          //     $pagination = $this->listmaintenance->makePagination(site_url('listmaintenance/getroom/'), 3, $jumlah);
          //         if (!$list){
          //           $this->session->set_flashdata('warning', 'Sorry data not found..');
          //           redirect('listmaintenance');
          //         }
          //     $main_view  = 'v-listmaintenance/index';
          //     $this->load->view('template', compact('main_view', 'list','pagination','jumlah'));
          // }








    //this function for double combo selected
    public function get($page = null) {

        $select1  = $this->input->get('selected1');
        $select2  = $this->input->get('selected2');

        $list   = $this->listmaintenance->where('l_month', $select1)
                                        ->where('l_year', $select2)
                                        ->orLike('l_id_list', 'l_id_list')
                                        ->join('users')
                                        // ->join('room')
                                        ->joincoy('computers')
                                        ->orderBy('room.id_room', 'ASC')
                                        ->paginate($page)
                                        ->getAll();
        $jml    = $this->listmaintenance->where('l_month', $select1)
                                        ->where('l_year', $select2)
                                        ->orderBy('listmaintenance.l_id_list')
                                        ->getAll();

        $jumlah = count($jml);
        $pagination = $this->listmaintenance->makePagination(site_url('listmaintenance/get/'), 3, $jumlah);
            if (!$list){
              $this->session->set_flashdata('warning', 'Sorry data not found..');
              redirect('listmaintenance');
            }
        $main_view  = 'v-listmaintenance/index';
        $this->load->view('template', compact('main_view', 'list','pagination','jumlah'));
    }

    public function printall()
  	{
  		$list	  = $this->listmaintenance->print_all_model();
  		$total	= count($list);

  		$html = $this->load->view('v-listmaintenance/print_all', compact('list', 'total'), true);

  		require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");

  		try {
  			$html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('10', '10', '10', '5'));
  			$html2pdf->WriteHTML($html);
  			$html2pdf->pdf->SetTitle('List Maintenance');
  			$html2pdf->output('List-Maintenance'.date('Ymd').'.pdf');

  		} catch (HTML2PDF_exception $e) {
  			// echo($e);
  			$this->session->set_flashdata('error', 'Sorry.. That Something wrong, please check before or contact your developer!');
  			redirect('listmaintenance');
  		}
  	}

/*Control Card Function & Print */

  	public function controlcard($page = null)
    	{
    		$controlcard	= $this->listmaintenance->join('users')
                                              ->joincoy('computers')
    																		      ->orderBy('l_id_list', 'desc')
										                          ->paginate($page)->getAll();
    		$jml 					= $this->listmaintenance->orderBy('l_id_list')->getAll();

    		$jumlah 			= count($jml);
    		$main_view 		= 'v-listmaintenance/controlcard';
    		$pagination 	= $this->listmaintenance->makePagination(site_url('listmaintenance/controlcard/'), 3, $jumlah);
    		$this->load->view('template', compact('main_view', 'controlcard', 'pagination', 'jumlah'));
    	}

    	public function print_controlcard($id = null) {

    		$controlcard	  	= $this->listmaintenance->join('users')
  																        ->joincoy('computers')
							  	                        ->where('sha1(l_id_list)', $id)->get();
    			if (!$controlcard) {
    				$this->session->set_flashdata('warning', 'Data Not Found !');
    				redirect('listmaintenance/controlcard');
    			} else {

    		$html = $this->load->view('v-listmaintenance/print_controlcard', compact('controlcard'), true);
    			}
    		require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");

    		try {
    			$html2pdf = new HTML2PDF('P', 'Latter', 'en', true, 'UTF-8', array('10', '10', '10', '5'));
    			$html2pdf->WriteHTML($html);
    			$html2pdf->pdf->SetTitle('Control Card');
    			$html2pdf->output('controlcard'.date('Ymd').'.pdf');
    		} catch (HTML2PDF_exception $e) {
    			// echo($e);
    			$this->session->set_flashdata('error', 'Sorry.. Something when wrong, please contact your root administrator!');
    			redirect('listmaintenance/controlcard'); //back to function.
    		}

    	}

}
