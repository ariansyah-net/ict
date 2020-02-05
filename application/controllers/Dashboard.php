<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->halaman = 'Dashboard';
        $this->load->library('user_agent', 'url');
        $this->isLogin();
    }
    public function isLogin()
    {
      $isLogin = $this->session->userdata('is_login');
      if(!$isLogin){
          redirect('login');
      }
    }

    function index() {
      if ($this->agent->is_browser()) {
        $agent = $this->agent->browser().' Version '.$this->agent->version();
      }elseif ($this->agent->is_robot()){
        $agent = $this->agent->robot();
      }elseif ($this->agent->is_mobile()){
        $agent = $this->agent->mobile();
      }else{
        $agent = 'Unidentified User Agent';
      }
      $data['active']     = $this->db->get_where('it_users', array('is_active'=>'Y','role_id'=>'0'))->num_rows();
      $data['pc']         = $this->db->get_where('it_computers', array('pc_active'=>'Y'))->num_rows();
      $data['laptop']     = $this->db->get_where('it_laptops', array('laptop_active'=>'Y'))->num_rows();
      $data['devices']    = $this->db->get_where('it_devices', array('d_active'=>'Y'))->num_rows();
      
      $data['user']       = $this->db->get_where('it_users', ['username' => $this->session->userdata('username')])->row_array();
      $data['title']      = 'Admin | Dashboard';
      $data['main_view']  = '_adm/v_dashboard/index';
      $data['browser']    = $agent;
      $data['os']         = $this->agent->platform();
      $data['ip']         = $this->input->ip_address();
      $this->load->view('_temp/index', $data);
  }


// ========== CHANGE AUTHOR ==================

  function change_author() {
    $id = $this->uri->segment(3);
      if (isset($_POST['submit'])){
        $this->it->update_users();
        $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data has been changed..');
        redirect('dashboard/users');
      }else{
        $data['title']      = 'Admin | Change Author';
        $data['main_view']  = '_adm/v_users/change';
        $data['rows']       = $this->it->change_users($id)->row_array();
        $this->load->view('_temp/index', $data);
      }
    }


// ========== USERS FUNCTION =================

    function users(){
      $data['unique']     = $this->db->get_where('it_users', array('unique_user' => 'Y'))->num_rows();
      $data['nonactive']  = $this->db->get_where('it_users', array('is_active' => 'N'))->num_rows();

      $data['title']    	= 'Admin | Users List';
      $data['main_view']  = '_adm/v_users/index';
      $data['ar']    			= $this->it->load_users();
      $this->load->view('_temp/index', $data);
    }
    function add_users() {
		if (isset($_POST['submit'])){
			$this->it->insert_users();
			$this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data added successfully..');
			redirect('dashboard/users');
		}else{
      $data['title']      = 'Admin | Add DemoScript';
      $data['main_view']  = '_adm/v_users/add';
			$this->load->view('_temp/index', $data);
		}
  }
    function change_users() {
  		$id = $this->uri->segment(3);
  		if (isset($_POST['submit'])){
  			$this->it->update_users();
  			$this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data has been changed..');
  			redirect('dashboard/users');
  		}else{
  			$data['title']      = 'Admin | Cange Users';
  			$data['main_view']  = '_adm/v_users/change';
  			// $data['record']     = $this->demo_model->view_category();
  			$data['rows'] 			= $this->it->change_users($id)->row_array();
  			$this->load->view('_temp/index', $data);
  		}
    }

    function remove_users(){
  		$id = $this->uri->segment(3);
  		$this->it->delete_users($id);
      $this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey user has been removed..');
  		redirect('dashboard/users');
	}

// ========================= FIELDWORK ==========================

  function fieldwork(){
    $data['title']    	= 'Configuration Fieldwork';
    $data['main_view']  = '_adm/v_fieldwork/index';
    $data['ar']    			= $this->it->load_fieldwork();
    $this->load->view('_temp/index', $data);
  }
  function add_fieldwork() {
		if (isset($_POST['submit'])){
			$this->it->insert_fieldwork();
			$this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey fieldwork added successfully..');
			redirect('dashboard/fieldwork');
		}else{
			$data['title']      = 'Admin | Add Fieldwork';
			$data['main_view']  = '_adm/v_fieldwork/add';
			$this->load->view('_temp/index', $data);
		}
	}
  function change_fieldwork() {
    $id = $this->uri->segment(3);
    if (isset($_POST['submit'])){
      $this->it->update_fieldwork();
      $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data has been changed..');
      redirect('dashboard/fieldwork');
    }else{
      $data['title']      = 'Change Fieldwork';
      $data['main_view']  = '_adm/v_fieldwork/change';
      $data['ar'] 			  = $this->it->change_fieldwork($id)->row_array();
      $this->load->view('_temp/index', $data);
    }
  }
  function remove_fieldwork(){
		$id = $this->uri->segment(3);
		$this->it->delete_fieldwork($id);
		$this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey data has been removed..');
		redirect('dashboard/fieldwork');
	}

// ========================= ROOMS ==========================

  function rooms(){
    $data['title']    	= 'Configuration Rooms';
    $data['main_view']  = '_adm/v_rooms/index';
    $data['ar']    			= $this->it->load_rooms();
    $this->load->view('_temp/index', $data);
  }
  function add_rooms() {
    if (isset($_POST['submit'])){
      $this->it->insert_rooms();
      $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey room added successfully..');
      redirect('dashboard/rooms');
    }else{
      $data['title']      = 'Admin | Add Room';
      $data['main_view']  = '_adm/v_rooms/add';
      $this->load->view('_temp/index', $data);
    }
  }
  function change_rooms() {
    $id = $this->uri->segment(3);
    if (isset($_POST['submit'])){
      $this->it->update_rooms();
      $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data has been changed..');
      redirect('dashboard/rooms');
    }else{
      $data['title']      = 'Change Rooms';
      $data['main_view']  = '_adm/v_rooms/change';
      $data['ar'] 			  = $this->it->change_rooms($id)->row_array();
      $this->load->view('_temp/index', $data);
    }
  }
  function remove_rooms(){
		$id = $this->uri->segment(3);
		$this->it->delete_rooms($id);
		$this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey data has been removed..');
		redirect('dashboard/rooms');
	}

// ================================ LOCATIONS =====================================
    function locations(){
      $data['title']    	= 'Configuration Locations';
      $data['main_view']  = '_adm/v_locations/index';
      $data['ar']    			= $this->it->load_locations();
      $this->load->view('_temp/index', $data);
    }
    function add_locations() {
      if (isset($_POST['submit'])){
        $this->it->insert_locations();
        $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey room added successfully..');
        redirect('dashboard/locations');
      }else{
        $data['title']      = 'Admin | Add Locations';
        $data['main_view']  = '_adm/v_locations/add';
        $this->load->view('_temp/index', $data);
      }
    }
    function change_locations() {
      $id = $this->uri->segment(3);
      if (isset($_POST['submit'])){
        $this->it->update_locations();
        $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data has been changed..');
        redirect('dashboard/locations');
      }else{
        $data['title']      = 'Change Locations';
        $data['main_view']  = '_adm/v_locations/change';
        $data['ar'] 			  = $this->it->change_locations($id)->row_array();
        $this->load->view('_temp/index', $data);
      }
    }
    function remove_locations(){
  		$id = $this->uri->segment(3);
  		$this->it->delete_locations($id);
  		$this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey data has been removed..');
  		redirect('dashboard/locations');
  	}

// ================================ YEARS =====================================
        function years(){
          $data['title']    	= 'Configuration Years';
          $data['main_view']  = '_adm/v_years/index';
          $data['ar']    			= $this->it->load_years();
          $this->load->view('_temp/index', $data);
        }
        function add_years() {
          if (isset($_POST['submit'])){
            $this->it->insert_years();
            $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey year added successfully..');
            redirect('dashboard/years');
          }else{
            $data['title']      = 'Admin | Add Years';
            $data['main_view']  = '_adm/v_years/add';
            $this->load->view('_temp/index', $data);
          }
        }
        function change_years() {
          $id = $this->uri->segment(3);
          if (isset($_POST['submit'])){
            $this->it->update_years();
            $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data has been changed..');
            redirect('dashboard/years');
          }else{
            $data['title']      = 'Change Years';
            $data['main_view']  = '_adm/v_years/change';
            $data['ar'] 			  = $this->it->change_years($id)->row_array();
            $this->load->view('_temp/index', $data);
          }
        }
        function remove_years(){
      		$id = $this->uri->segment(3);
      		$this->it->delete_years($id);
      		$this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey data has been removed..');
      		redirect('dashboard/years');
      	}

// ================================ COMPUTERS =====================================
    function computers(){
      $data['title']    	= 'Admin | Computers';
      $data['main_view']  = '_adm/v_computers/index';
      $data['ar']    			= $this->it->load_computers();
      $this->load->view('_temp/index', $data);
    }
    function add_computers() {
		if (isset($_POST['submit'])){
			$this->it->insert_computers();
			$this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data added successfully..');
			redirect('dashboard/computers');
		}else{
      $data['title']      = 'Admin | Add Computers';
      $data['main_view']  = '_adm/v_computers/add';
			$this->load->view('_temp/index', $data);
  		}
    }
    function change_computers() {
      $id = $this->uri->segment(3);
      if (isset($_POST['submit'])){
        $this->it->update_computers();
        $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data has been changed..');
        redirect('dashboard/computers');
      }else{
        $data['title']      = 'Change Computers';
        $data['main_view']  = '_adm/v_computers/change';
        $data['ar'] 			  = $this->it->change_computers($id)->row_array();
        $this->load->view('_temp/index', $data);
      }
    }
    function remove_computers(){
      $id = $this->uri->segment(3);
      $this->it->delete_computers($id);
      $this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey data has been removed..');
      redirect('dashboard/computers');
    }


// =============================== LAPTOP ======================================

    function laptops(){
      $data['title']    	= 'Admin | Laptops';
      $data['main_view']  = '_adm/v_laptops/index';
      $data['ar']    			= $this->it->load_laptops();
      $this->load->view('_temp/index', $data);
    }

    function add_laptops() {
		if (isset($_POST['submit'])){
			$this->it->insert_laptops();
			$this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data added successfully..');
			redirect('dashboard/laptops');
		}else{
      $data['title']      = 'Admin | Add Laptop';
      $data['main_view']  = '_adm/v_laptops/add';
			$this->load->view('_temp/index', $data);
  		}
    }
    function change_laptops() {
      $id = $this->uri->segment(3);
      if (isset($_POST['submit'])){
        $this->it->update_laptops();
        $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data has been changed..');
        redirect('dashboard/laptops');
      }else{
        $data['title']      = 'Change Laptops';
        $data['main_view']  = '_adm/v_laptops/change';
        $data['ar'] 			  = $this->it->change_laptops($id)->row_array();
        $this->load->view('_temp/index', $data);
      }
    }
    function remove_laptops(){
      $id = $this->uri->segment(3);
      $this->it->delete_laptops($id);
      $this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey data has been removed..');
      redirect('dashboard/laptops');
    }

// =============================== DEVICES =====================================
    function devices(){
      $data['title']    	= 'Admin | Devices';
      $data['main_view']  = '_adm/v_devices/index';
      $data['ar']    			= $this->it->load_devices();
      $this->load->view('_temp/index', $data);
    }
    function add_devices() {
		if (isset($_POST['submit'])){
			$this->it->insert_devices();
			$this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data added successfully..');
			redirect('dashboard/devices');
		}else{
      $data['title']      = 'Admin | Add Device';
      $data['main_view']  = '_adm/v_devices/add';
			$this->load->view('_temp/index', $data);
  		}
    }
    function change_devices() {
      $id = $this->uri->segment(3);
      if (isset($_POST['submit'])){
        $this->it->update_devices();
        $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data has been changed..');
        redirect('dashboard/devices');
      }else{
        $data['title']      = 'Change Devices';
        $data['main_view']  = '_adm/v_devices/change';
        $data['ar'] 			  = $this->it->change_devices($id)->row_array();
        $this->load->view('_temp/index', $data);
      }
    }
    function remove_devices(){
      $id = $this->uri->segment(3);
      $this->it->delete_devices($id);
      $this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey data has been removed..');
      redirect('dashboard/devices');
    }

// ============================= USERS PROBLEM =================================

    function problem(){
      $data['title']    	= 'Admin | User Problem';
      $data['main_view']  = '_adm/v_problem/index';
      $data['ar']      = $this->it->load_problem();
      $this->load->view('_temp/index', $data);
    }
    function add_problem() {
  		if (isset($_POST['submit'])){
  			$this->it->insert_problem();
  			$this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data added successfully..');
  			redirect('dashboard/problem');
  		}else{
        $data['title']      = 'Admin | Add Problem User';
        $data['main_view']  = '_adm/v_problem/add';
  			$this->load->view('_temp/index', $data);
    		}
    }
    function change_problem() {
      $id = $this->uri->segment(3);
      $this->db->query("UPDATE it_problems SET problem_read='1' WHERE id_problem='$id'");
      if (isset($_POST['submit'])){
        $this->it->update_problem();
        $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data has been changed..');
        redirect('dashboard/problem');
      }else{
        $data['title']      = 'Change Problem';
        $data['main_view']  = '_adm/v_problem/change';
        $data['usr']        = $this->it->load_problem();
        $data['ar'] 			  = $this->it->change_problem($id)->row_array();
        $this->load->view('_temp/index', $data);
      }
    }

    function remove_problem(){
      $id = $this->uri->segment(3);
      $this->it->delete_problem($id);
      $this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey data has been removed..');
      redirect('dashboard/problem');
    }

// ========== SCHEDULE MAINTENANCE =================

  function schedule_maintenance() {
    $data['title']    	= 'Admin | Schedule Maintenance';
    $data['main_view']  = '_adm/v_schedule/index';
    $data['ar']         = $this->it->load_schedule();
    $this->load->view('_temp/index', $data);

  }

  function add_schedule() {
    if (isset($_POST['submit'])){
      $this->it->insert_schedule();
      $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data added successfully..');
      redirect('dashboard/schedule_maintenance');
    }else{
      $data['title']      = 'Admin | Add Schedule Maintenance';
      $data['main_view']  = '_adm/v_schedule/add';
      $this->load->view('_temp/index', $data);
      }
  }

  function change_schedule() {
    $id = $this->uri->segment(3);
    if (isset($_POST['submit'])){
      $this->it->update_schedule();
      $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data has been changed..');
      redirect('dashboard/schedule_maintenance');
    }else{
      $data['title']      = 'Change Schedule';
      $data['main_view']  = '_adm/v_schedule/change';
      // $data['usr']        = $this->it->load_schedule();
      $data['ar'] 			  = $this->it->change_schedule($id)->row_array();
      $this->load->view('_temp/index', $data);
    }
  }

  function remove_schedule(){
    $id = $this->uri->segment(3);
    $this->it->delete_schedule($id);
    $this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey schedule has been removed..');
    redirect('dashboard/schedule_maintenance');
  }

  // ========== LIST MAINTENANCE =================

  function list_maintenance() {

    $data = array();
    // If record delete request is submitted
        if($this->input->post('bulk_delete_submit')){
            // Get all selected IDs
            $ids = $this->input->post('checked_id');

             // If id array is not empty
            if(!empty($ids)){
                // Delete records from the database
                $delete = $this->it->delete_selected_listmaintenance($ids);

                // If delete is successful
                if($delete){
                    $this->session->set_flashdata('info','<i class="fas fa-check-circle"></i> Selected users have been deleted successfully.');
                    // $data['statusMsg'] = 'Selected users have been deleted successfully.';
                }else{
                    $this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Some problem occurred, please try again.');
                    // $data['statusMsg'] = 'Some problem occurred, please try again.';
                }
            }else{
                $this->session->set_flashdata('warning','<i class="fas fa-exclamation-circle"></i> Select at least 1 record to delete.');
                // $data['statusMsg'] = 'Select at least 1 record to delete.';
            }
        }

    // Get user data from the database
    $data['ar']         = $this->it->getRowsListMaintenance();

    $data['title']    	= 'Admin | List Maintenance';
    $data['main_view']  = '_adm/v_listmaintenance/index';
    $data['ar']         = $this->it->load_listmaintenance();
    $this->load->view('_temp/index', $data);
  }


  function change_listmaintenance() {
    $id = $this->uri->segment(3);
    if (isset($_POST['submit'])){
      $this->it->update_listmaintenance();
      $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data has been changed..');
      redirect('dashboard/list_maintenance');
    }else{
      $data['title']      = 'Change List Maintenance';
      $data['main_view']  = '_adm/v_listmaintenance/change';
      $data['ar'] 			  = $this->it->change_listmaintenance($id)->row_array();
      $this->load->view('_temp/index', $data);
    }
  }

  function add_listmaintenance() {
    if (isset($_POST['submit'])){
      $this->it->insert_listmaintenance();
      $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data added successfully..');
      redirect('dashboard/list_maintenance');
    }else{
      $data['title']      = 'Admin | Add List Maintenance';
      $data['main_view']  = '_adm/v_listmaintenance/add';
      $this->load->view('_temp/index', $data);
      }
  }

  function remove_listmaintenance(){
    $id = $this->uri->segment(3);
    $this->it->delete_listmaintenance($id);
    $this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey data has been removed..');
    redirect('dashboard/list_maintenance');
  }

  // function listremove_selected(){
  //   $idlistmaintenance = $_POST['id_listmaintenance'];
  //   $this->it->delete_selected_listmaintenance($idlistmaintenance);
  //   $this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey seleted data has been removed..');
  //   redirect('dashboard/list_maintenance');
  //   // print_r($_POST);
  // }

  // ========== CONTROL CARD =================

  function control_card() {
    $this->load->library('Pdf');
    $data['title']    	= 'Admin | Control Card';
    $data['main_view']  = '_adm/v_controlcard/index';
    $data['ar']         = $this->it->load_controlcard();
    $this->load->view('_temp/index', $data);
  }

    public function print_card()
    {
      $id = $this->uri->segment(3);
      $this->load->library('Pdf');
      $data['title']    	= 'Admin | Control Card';
      $data['main_view']  = '_adm/v_controlcard/print';
      // $data['ar']         = $this->it->load_controlcard();
      $data['ar'] 			  = $this->it->show_controlcard($id)->row_array();
      $this->load->view('_temp/index', $data);
    }



/*
* Start Create : 25 Nov 2019 AM
* Here we go, this function for menu settings in admin menu
*/

  function page() {
    $data['title']    	= 'Admin | Post Page';
    $data['main_view']  = '_adm/v_page/index';
    $data['ar']         = $this->it->load_page();
    $this->load->view('_temp/index', $data);
  }
  function add_page() {
  if (isset($_POST['submit'])){
    $this->it->insert_page();
    $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey post added successfully..');
    redirect('dashboard/page');
  }else{
    $data['title']      = 'Admin | Add Page Post';
    $data['main_view']  = '_adm/v_page/add';
    $data['ar']        = $this->it->load_page();
    $this->load->view('_temp/index', $data);
    }
  }
  function change_page() {
    $id = $this->uri->segment(3);
    if (isset($_POST['submit'])){
      $this->it->update_page();
      $this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey data has been changed..');
      redirect('dashboard/page');
    }else{
      $data['title']      = 'Change Post Page';
      $data['main_view']  = '_adm/v_page/change';
      $data['pg']         = $this->it->load_page();
      $data['ar'] 			  = $this->it->change_page($id)->row_array();
      $this->load->view('_temp/index', $data);
    }
  }
  function remove_page(){
    $id = $this->uri->segment(3);
    $this->it->delete_page($id);
    $this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey data has been removed..');
    redirect('dashboard/page');
  }


// ======== Custome Landing Page ================

  function landing() {
    if (isset($_POST['submit'])){
			$this->it->update_landing();
			redirect('dashboard/landing');
		}else{
      $data['title']    	= 'Admin | Customize Landing Page';
      $data['main_view']  = '_adm/v_landingpage/index';
			$data['ar'] = $this->it->customize_landing()->row_array();
      $this->load->view('_temp/index', $data);
			// $this->template->load('fh5fh19/template','fh5fh19/mod_identitas/view_identitas',$data);
		}
  }

// ======== NAVBAR MENU FOR HOME ================

  function navmenu() {
    $data['title']    	= 'Admin | Post Page';
    $data['main_view']  = '_adm/v_navmenu/index';
    $data['ar']         = $this->it->load_navmenu();
    $this->load->view('_temp/index', $data);
  }

  function add_navmenu() {
    if (isset($_POST['submit'])){
      $this->it->insert_navmenu();
      $this->session->set_flashdata('message','<i class="fas fa-exclamation-circle"></i> Okey menu added successfully.');
      redirect('dashboard/navmenu');
    }else{
      $data['title']      = 'Admin | Add Menus Content';
      $data['main_view']  = '_adm/v_navmenu/add';
      $this->load->view('_temp/index', $data);
      }
    }

  function change_navmenu() {
    $id = $this->uri->segment(3);
    if (isset($_POST['submit'])){
      $this->it->update_navmenu();
      $this->session->set_flashdata('info','<i class="far fa-check-circle"></i> Okey data has been changed.');
      redirect('dashboard/navmenu');
    }else{
      $data['title']      = 'Admin | Change Site Menu';
      $data['main_view']  = '_adm/v_navmenu/change';
      $data['ar'] 			  = $this->it->change_navmenu($id)->row_array();
      $this->load->view('_temp/index', $data);
    }
  }

  function remove_navmenu(){
    $id = $this->uri->segment(3);
    $this->it->delete_navmenu($id);
    $this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey data has been removed..');
    redirect('dashboard/navmenu');
  }


// =============== DOWNLOADS ==================

  function downloads() {
    $data['title']    	= 'Admin | Downloads';
    $data['main_view']  = '_adm/v_download/index';
    $data['ar']         = $this->it->load_download();
    $this->load->view('_temp/index', $data);
  }

  function add_downloads() {
    if (isset($_POST['submit'])){
      $this->it->insert_download();
      $this->session->set_flashdata('success','<i class="fas fa-exclamation-circle"></i> Okey File added successfully..');
      redirect('dashboard/downloads');
    }else{
      $data['title']      = 'Admin | Add Filemanager';
      $data['main_view']  = '_adm/v_download/add';
      $this->load->view('_temp/index', $data);
    }
  }

  function change_downloads() {
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->it->update_downloads();
			$this->session->set_flashdata('info','<i class="fas fa-exclamation-circle"></i> Okey file has been changed..');
			redirect('dashboard/downloads');
		}else{
			$data['title']      = 'Admin | Change Download';
			$data['main_view']  = '_adm/v_download/change';
			$data['ar'] 				= $this->it->change_downloads($id)->row_array();
			$this->load->view('_temp/index', $data);
		}
	}

	function remove_downloads(){
		$id = $this->uri->segment(3);
		$this->it->delete_downloads($id);
		$this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey file removed..');
		redirect('dashboard/downloads');
	}

// ============= INBOX MESSAGE ================

  function inbox() {
     $data['title'] 		  = 'Admin | Inbox';
     $data['main_view']   = '_adm/v_inbox/index';
     $data['ar']    	    = $this->db->get('it_inbox');
     // $data['ar']        = $this->it->load_inbox();
     $this->load->view('_temp/index', $data);
   }

  function detail_inbox(){

  		$id = $this->uri->segment(3);
  		$this->db->query("UPDATE it_inbox SET inbox_read='Y' WHERE id_inbox='$id'");
  		if (isset($_POST['submit'])){
  			$this->it->reply_message();
  			$data['ar']         = $this->it->view_inbox($id)->row_array();
  			$data['title']			= 'Reply Message';
  			$data['main_view']  = '_adm/v_inbox/detail';
  			$this->load->view('_temp/index', $data);
  		}else{
  			$data['ar']         = $this->it->view_inbox($id)->row_array();
  			$data['title']			= 'Reply Message';
  			$data['main_view']  = '_adm/v_inbox/detail';
  			$this->load->view('_temp/index', $data);
  		}
  	}

  function remove_inbox(){
    $id = $this->uri->segment(3);
    $this->it->delete_inbox($id);
    $this->session->set_flashdata('danger','<i class="fas fa-exclamation-circle"></i> Okey Data removed');
    redirect('dashboard/inbox');
   }



}
