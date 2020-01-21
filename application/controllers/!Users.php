<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'users', true);
        $this->load->library('image_lib');
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
      // $users 		 = $this->users->paginate($page)->orderBy('id_users', 'desc')->getAll(); //add: paginate($page)->
      // $jml        = $this->users->getAll();

      $users	    = $this->users->join('room')
                                ->orderBy('id_users', 'desc')
                                ->paginate($page)->getAll();
  	  $jml 				= $this->users->orderBy('id_users')->getAll();

      $jumlah     = count($jml);
      $main_view 	= 'v-users/index';
      $pagination = $this->users->makePagination(site_url('users'), 2, $jumlah);

    	$this->load->view('template', compact('main_view', 'users', 'pagination', 'jumlah'));
    }


    // PERLU PERBAIKAN JOIN TABLE DAN RELASI DATABASE


    public function create()
    {

    	if (!$_POST) {
    		$input = (object) $this->users->getDefaultValues();
    	} else {
    		$input = (object) $this->input->post(null, true);
    	}

    	if (!empty($_FILES) && $_FILES['avatar']['size'] > 0) {
            $avatarFileName  = date('YmdHis'); // avatar file name
            $upload = $this->users->uploadCover('avatar', $avatarFileName);

            if ($upload) {
                $input->avatar =  "$avatarFileName.jpg"; // Data for column "avatar".
                $this->users->avatarResize('avatar', "./photos/$avatarFileName.jpg", 256, 256); //Default 128 x 128
            }
        }

    	if (!$this->users->validate() || $this->form_validation->error_array()){
	    		$main_view = 'v-users/form';
	    		$form_action = 'users/create';
	    		$this->load->view('template', compact('main_view', 'form_action', 'input'));
	    		return;
    	}

      unset($input->room_name); //remove fake input
  		unset($input->search_room); //remove fake input

    	if ($this->users->insert($input)) {
    		$this->session->set_flashdata('success', 'New user successfully added..');

    	} else {
    		$this->session->set_flashdata('danger', 'Error when insert this data, please try again or contact Developer..');
    	}
    	redirect('users');
    }

//validation form
/*
	public function is_password_required()
	{
		$edit =  $this->uri->segment(2);
		if($edit != 'edit') {
			$password = $this->input->post('password', true);
			if(empty($password)){
				$this->form_validation->set_message('is_password_required', '%s harus diisi.');
				return false;
			}
		}
		return true;
	}
*/




    public function edit($id = null)
    {
        $this->load->library('image_lib');
        // $users = $this->users->where('sha1(id_users)', $id)->get();

        //if you use auto complete into form, you must set join table ex bellow
        $users = $this->users->where('sha1(id_users)', $id)
                             ->join('room', 'id_room')
                             ->get();
        if (!$users) {
            $this->session->set_flashdata('warning', 'User not found!');
            redirect('users');
        }

            if (!$_POST) {
                $input = (object) $users;

            } else {
                $input = (object) $this->input->post(null, true);
                $input->avatar = $users->avatar;
            }

        //upload new avatar
            if (!empty($_FILES) && $_FILES['avatar']['size'] > 0) {
        //upload new avatar (if any)
            $avatarFileName  = date('YmdHis'); // Cover file name
            $upload = $this->users->uploadCover('avatar', $avatarFileName);
        //resize avatar
            if ($upload) {
                $input->avatar =  "$avatarFileName.jpg"; // Data for column "cover".
                $this->users->avatarResize('avatar', "./photos/$avatarFileName.jpg", 256, 256); //Default 128 x 128

              //delete old avatar
              if ($users->avatar) {
                  $this->users->deleteAvatar($users->avatar);
                  }
                }
            }
      //something when wrong
        if (!$this->users->validate() || $this->form_validation->error_array()) {
                $main_view = 'v-users/form';
                $form_action = "users/edit/$id";
                $this->load->view('template', compact('main_view', 'form_action', 'input'));
                return;
                }

    		unset($input->search_room); //remove fake input
        unset($input->room_name); //remove fake input

        //update data
        if ($this->users->where('sha1(id_users)', $id)->update($input)) {
            $this->session->set_flashdata('info', 'Update data successfully.');
        } else {
            $this->session->set_flashdata('danger', 'Error when update this data,  tray again or contact your Developer..');
        }
          redirect('users');
    }


//function delete data

    public function delete($id = null)
    {
        $users = $this->users->where('sha1(id_users)', $id)->get();
        if (!$users) {
            $this->session->set_flashdata('warning', 'Khmm data not found!.');
            redirect('users');
        }

        if ($this->users->where('sha1(id_users)', $id)->delete()) {
            //delete avatar
            $this->users->deleteAvatar($users->avatar);
            $this->session->set_flashdata('success', 'Remove data successfully');

        } else {
            $this->session->set_flashdata('danger', 'Something wrong when remove this data, please try again or contact your Developer.');
        }
        redirect('users');
    }

// Function search user

    public function search($page = null)
    {

        $keywords   = $this->input->get('keywords', true);
        $users      = $this->users->join('room')
                                  ->where('code_user', $keywords)
                                  ->orLike('nama_user', $keywords)
                                  ->paginate($page)
                                  ->getAll();
        $jml        = $this->users->join('room')
                                  ->where('code_user', 'nama_user', $keywords)
                                  ->orLike('nama_user', $keywords)
                                  ->paginate($page)
                                  ->getAll();
        $jumlah     = count($jml);
        $pagination = $this->users->makePagination(site_url('users/search/'), 3, $jumlah);

            if (!$users) {
                $this->session->set_flashdata('warning', 'Data not found!.');
                redirect('users');
            }
        $main_view  = 'v-users/index';
        $this->load->view('template', compact('main_view', 'users', 'pagination', 'jumlah'));
    }


    public function print_user($id = null)
    {

        $user   = $this->users->where('sha1(id_users)', $id)->get();

            if (!$user) {
                $this->session->set_flashdata('warning', 'Data not found!..');
                redirect('users');
            } else {

            $html = $this->load->view('v-users/print_pdf', compact('user'), true);
            }

        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");

        try {
            $html2pdf = new HTML2PDF('P', 'Latter', 'en', true, 'UTF-8', array('15', '10', '10', '10'));
            $html2pdf->WriteHTML($html);
            $html2pdf->output('report_user_'.date('Ymd').'.pdf');

        } catch (HTML2PDF_exception $e) {
            // echo($e);
            $this->session->set_flashdata('error', 'Sorry, that something wrong, please contact your developer..');
            redirect('users');
        }

    }


    public function code_unik()
    {
        $codeuser = $this->input->post('code_user');
        $id_users = $this->input->post('id_users');

        $this->users->where('code_user', $codeuser);
        !$id_users || $this->users->where('id_users !=', $id_users);
        $users = $this->users->get();

            if(count($users)) {
                $this->form_validation->set_message('code_unik', '%s already exists.');
                return false;
            }
            return true;
    }

    public function name_unique()
    {
        $namauser = $this->input->post('nama_user');
        $id_users = $this->input->post('id_users');

        $this->users->where('nama_user', $namauser);
        !$id_users || $this->users->where('id_users !=', $id_users);
        $users = $this->users->get();

            if(count($users)) {
                $this->form_validation->set_message('name_unique', 'khmm.. %s already exists.');
                return false;
            }
            return true;
    }

//get by Rooms and location
  public function getroom($page = null)
  {
      if(!$_POST) {
          $input = (object) $this->users->getDefaultValues();
      } else {
          $input = (object) $this->input->post(null, true);
      }

      if (!$this->users->validate())
      {
          $room     = $this->input->get('keywords');
          $users	    = $this->users->join('room')
                                    ->where('room_name', $room)
                                    ->orLike('id_users', 'id_users')
                                    ->orderBy('id_users', 'desc')
                                    ->paginate($page)
                                    ->getAll();

          $jml        = $this->users->join('room')
                                    ->where('room_name', $room)
                                    ->orLike('id_users', 'id_users')
                                    ->getAll();

          $jumlah     = count($jml);
          $pagination = $this->users->makePagination(site_url('users/getroom'), 4, $jumlah);

              if (!$users) {
                  $this->session->set_flashdata('warning', 'Sorry.. data not found!');
                  redirect('users');
              }
          $main_view    = 'v-users/index';
          $form_action  = 'users';
          $this->load->view('template', compact('main_view', 'users', 'pagination', 'jumlah', 'form_action', 'input'));
          return;
        }
      if ($this->users->insert($input))
        {
          $this->session->set_flashdata('success', 'New Schedule successfully added..');
        } else {
          $this->session->set_flashdata('danger', 'Uppss.. there is wrong when insert this data, please check your database!');
        }
          redirect('users');
      }


      public function room_auto_complete()
        {
          $keywords  = $this->input->post('keywords');
          $usr       = $this->users->liveSearchRoom($keywords);
          foreach ($usr as $room)
            {
                // $code_user = str_replace($keywords, '<strong>' .$keywords. '</strong>', $room->code_user);
                $room_name = preg_replace("#($keywords)#i", "<strong>$1</strong>", $room->room_name);
                $str  = '<li onclick="setItemRoom(\''.$room->room_name.'\'); makeHiddenIdRoom(\''.$room->id_room.'\')">';
                $str .= "<i class='fa fa-gg'></i>&nbsp; $room_name";
                //$str .= "<i class='fa fa-user-o'></i> &nbsp; $room_name";
                $str .= "</li>";
                echo $str;
            }
        }



}
