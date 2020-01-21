<?php defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->halaman = 'about';
    }

    public function index($page = null)
    {
        $halaman    = $this->halaman;
        $main_view  = 'v-about/about';
        $this->load->view('template', compact('halaman', 'main_view'));
    }
}
