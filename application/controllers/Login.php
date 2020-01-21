<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'login', true);
    }

	public function index()
    {
        if (!$_POST) {
            $input = (object) $this->login->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->login->validate()) {
            $title          = 'IT Operations | Login';
            $main_view      = '_home/home_login';
            $form_action    = 'login';
            $this->load->view('_temp/home_single', compact('main_view','title','form_action','input'));
            return;
        }

        if ($this->login->login($input)) {
            $this->session->set_flashdata('info', 'Yeah.. welcome administrator happy working. !');
            redirect(base_url('dashboard'));
        } else {
            $this->session->set_flashdata('danger', 'Upss.. username or password incorrect. !');
        }
        redirect('login');
	}

  	public function logout()
  	{
      $this->login->logout();
      redirect(base_url());
  	}

}
