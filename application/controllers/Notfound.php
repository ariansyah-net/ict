<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

  class Notfound extends MY_Controller
  {
    public function index() {
      $data['title']      = '404 Not Found';
      $data['main_view']  = 'notfound/index';
      $this->load->view('_temp/404', $data);
    }
}
