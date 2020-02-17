<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent', 'url');
        $this->isLogin();
    }

    function isLogin()
    {
      $isLogin = $this->session->userdata('is_login');
      if(!$isLogin){
          redirect('auth');
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

      // $data['devices']    = $this->db->get_where('it_devices', array('d_active'=>'Y'))->num_rows();
      
      $data['user']       = $this->db->get_where('it_users', ['username' => $this->session->userdata('username')])->row_array();
      $data['title']      = 'User | Dashboard';
      $data['main_view']  = '_user/index';
      $data['browser']    = $agent;
      $data['os']         = $this->agent->platform();
      $data['ip']         = $this->input->ip_address();
      $this->load->view('_temp/index', $data);
    }

}