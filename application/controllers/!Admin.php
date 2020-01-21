<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
            $this->load->model('admin_model', 'admin', true);
            $this->halaman = '<i class="fa fa-user"></i> &nbsp;Administrator';
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

        $admin          = $this->admin->paginate($page)->orderBy('id_admin', 'desc')->getAll();
        $jml            = $this->admin->getAll();

        $jumlah         = count($jml);
        $halaman        = $this->halaman;
        $main_view      = 'v-admin/index';
        $pagination     = $this->admin->makePagination(site_url('admin'), 2, $jumlah);
        $this->load->view('template', compact('halaman', 'main_view', 'admin', 'pagination', 'jumlah'));
    }

    public function create()
    {

        if (!$_POST) {
            $input = (object) $this->admin->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['avatar']['size'] > 0) {
            $avatarFileName  = date('YmdHis'); // avatar file name
            $upload = $this->admin->uploadCover('avatar', $avatarFileName);

            if ($upload) {
                $input->avatar =  "$avatarFileName.png"; // Data for column "avatar".
                $this->admin->avatarResize('avatar', "./photos/$avatarFileName.png", 128, 128);
            }

        }

        if (!$this->admin->validate() || $this->form_validation->error_array()){
                $halaman = $this->halaman;
                $main_view = 'v-admin/form';
                $form_action = 'admin/create';
                $this->load->view('template', compact('halaman', 'main_view', 'form_action', 'input'));
                return;
        }

        //hash password
        //$input->password = md5($input->password);

        if ($this->admin->insert($input)) {
            $this->session->set_flashdata('success', 'New Admin has been created.');

        } else {
            $this->session->set_flashdata('danger', 'Ups.. something went wrong, can`t add new admin..');
        }
        redirect('admin');
    }


}
