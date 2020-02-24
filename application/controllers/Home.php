<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->title = 'IT Operations';
        $this->load->library('user_agent', 'url');
    }

    // public function isLogin()
    // {
    //   $isLogin = $this->session->userdata('is_login');
    //   if(!$isLogin){
    //       redirect('auth');
    //   }
    // }

    public function index($page = null)
    {

        if ($this->agent->is_browser())
        {
        $agent = $this->agent->browser().' version '.$this->agent->version();
        }

        elseif ($this->agent->is_robot())
        {
        $agent = $this->agent->robot();
        }

        elseif ($this->agent->is_mobile())
        {
        $agent = $this->agent->mobile();
        }
        else
        {
        $agent = 'Unidentified User Agent';
        }

        // Calculate data
        $data['pc']         = $this->db->get_where('it_computers', array('pc_active'=>'Y'))->num_rows();
        $data['laptop']     = $this->db->get_where('it_laptops', array('laptop_active'=>'Y'))->num_rows();
        $data['printer']    = $this->db->get_where('it_devices', array('id_asset_category'=>'11'))->num_rows();
        $data['switch']     = $this->db->get_where('it_devices', array('id_asset_category'=>'2'))->num_rows();
        $data['ap']         = $this->db->get_where('it_devices', array('id_asset_category'=>'3'))->num_rows();
        $data['server']     = $this->db->get_where('it_devices', array('id_asset_category'=>'13'))->num_rows();

        $data['users']      = $this->db->get_where('it_users')->num_rows();
        $data['ps']         = $this->db->get_where('it_problems', array('result'=>'success'))->num_rows();
        $data['lm']         = $this->db->get_where('it_listmaintenance')->num_rows();


        $data['title']      = $this->title;
        $data['main_view']  = '_home/home_landing';
        $data['browser']    = $agent;
        $data['os']         = $this->agent->platform();
        $data['ip']         = $this->input->ip_address();
        $this->load->view('_temp/home_index', $data);

    }

    public function page(){

      $ids = $this->uri->segment(3);
      $dat = $this->db->query("SELECT * FROM it_pages WHERE page_slug='".$this->db->escape_str($ids)."'");
      $row = $dat->row();
      $total = $dat->num_rows();
      if ($total == 0){
        redirect(base_url());
      }
      $this->home->hits_update($ids);
      $data['ar']         = $this->db->query("SELECT * FROM it_pages a JOIN it_users b ON a.id_users=b.id_users WHERE page_slug='".$this->db->escape_str($ids)."'")->result();
      $data['title']      = $row->page_title;
      $data['main_view']  = '_home/page_content';
      $this->load->view('_temp/home_single', $data);
    }

// ========== CONTACT FORM ================

    public function contact(){
        $config_captcha = array(
                'img_path'    => './arians/home/captcha/',
                'img_url'     => base_url().'arians/home/captcha/',
                'font_path'   => './arians/home/captcha/captcha.ttf',
                'img_width'   => 190,
                'img_height'  => 60,
                'expiration'  => 2200,
                'word_length' => 6,
                'font-size'   => 22,
                'pool'        => '0123456789',
                'colors'      => array(
                                      'background' => array(255, 255, 255, 255),
                                      'border' => array(255, 255, 255),
                                      'text' => array(50, 50, 50),
                                      'grid' => array(230, 230, 230))
               );

        $cap = create_captcha($config_captcha);
        $data['img'] = $cap['image'];
        $this->session->set_userdata('keycode', md5($cap['word']));
        $data['title']       = 'Contact Us';
        $data['form_action'] = 'submit';
        $data['main_view']   = '_home/home_contact';
        $this->load->view('_temp/home_single', $data);
      }

    function cek() {
        $datadb = array('inbox_name'    => strip_tags($this->input->post('a')),
                        'inbox_email'   => htmlspecialchars($this->input->post('b')),
                        'inbox_subject' => htmlspecialchars($this->input->post('c')),
                        'inbox_message' => htmlspecialchars($this->input->post('d')),
                        'inbox_date'		=> date('Y-m-d'),
                        'inbox_time'    => date('H:i:s')
                        );
        $captcha  = $this->input->post('captcha');
        if(md5($captcha)==$this->session->userdata('keycode')){
          $this->session->unset_userdata('keycode');
          $this->db->insert('it_inbox', $datadb);
          $this->session->set_flashdata('info', 'Thankyou, your message has been sent, we will follow up on this!');
          redirect('home/contact');
        }else{
          $this->session->set_flashdata('danger', 'Uppss.. something is wrong message not send, please check your input bellow!');
          redirect('home/contact');
        }
    }


// ================== DOWNLOADS ================

    public function downloads(){
      
      // $isLogin = $this->session->userdata('is_login');
      // if(!$isLogin){
      //     redirect('auth');
      // }

      // $data['ar'] 			     = $this->it->orderBy('id_download', 'desc')->getAll();
      // $data['jml']        	= $this->download->getAll();
      // $data['jumlah'] 			= count($data['jml']);
      // $data['pagination'] 	= $this->download->makePagination(site_url('download'), 2, $data['jumlah']);
      $data['title']        = 'Downloads';
      $data['main_view']    = '_home/home_download';
      $data['ar']           = $this->home->list_download();
      $this->load->view('_temp/home_single', $data);
    }

    public function files(){
      $filename = $this->uri->segment(6);
      $this->home->update_hits_download($filename);
      $data = file_get_contents("arians/media/downloads/".$filename);
      force_download($filename, $data);
    }

// ============ TEAM =====================

  public function team(){
    $data['title']      = 'IT Operation | Team';
    $data['main_view']  = '_home/home_team';
    $this->load->view('_temp/home_single', $data);
  }

// ============= IT HELP ======================

  public function helpdesk() {
    $config_captcha = array(
            'img_path'    => './arians/home/captcha/',
            'img_url'     => base_url().'arians/home/captcha/',
            'font_path'   => './arians/home/captcha/captcha.ttf',
            'img_width'   => 190,
            'img_height'  => 60,
            'expiration'  => 2200,
            'word_length' => 6,
            'font-size'   => 22,
            'pool'        => '0123456789',
            'colors'      => array(
                                  'background' => array(255, 255, 255, 255),
                                  'border' => array(255, 255, 255),
                                  'text' => array(50, 50, 50),
                                  'grid' => array(230, 230, 230))
           );

    $cap = create_captcha($config_captcha);
    $data['img'] = $cap['image'];
    $this->session->set_userdata('keycode', md5($cap['word']));
    $data['title']      = 'IT Operations | Help Desk';
    $data['main_view']  = '_home/home_helpdesk';
    $this->load->view('_temp/home_single', $data);
  }

  function helpdesk_process() {
      $datadb = array('id_users'      => strip_tags($this->input->post('id_users')),
                      'inbox_email'   => htmlspecialchars($this->input->post('b')),
                      'inbox_subject' => htmlspecialchars($this->input->post('c')),
                      'inbox_message' => htmlspecialchars($this->input->post('d')),
                      'inbox_date'		=> date('Y-m-d')
                      );
      $captcha  = $this->input->post('captcha');
      if(md5($captcha)==$this->session->userdata('keycode')){
        $this->session->unset_userdata('keycode');
        $this->db->insert('it_problems', $datadb);
        $this->session->set_flashdata('info', 'Thankyou, your message has been sent, we will follow up on this!');
        redirect('home/contact');
      }else{
        $this->session->set_flashdata('danger', 'Uppss.. something is wrong message not send, please check your input bellow!');
        redirect('home/contact');
      }
  }


// ========== DEVICE TRACKING ===============

  public function device_tracking(){
    $data['title']      = 'Tracking Device';
    $data['main_view']  = '_home/home_device_tracking';
    $this->load->view('_temp/home_single', $data);
  }

// ========== STANDARD OPERATIONAL PROCEDURE ===============

  public function sop(){
    $data['title']      = 'Standard Operational Procedure';
    $data['main_view']  = '_home/home_sop';
    $data['ar']         = $this->home->load_sop();
    $this->load->view('_temp/home_single', $data);
  }





}
