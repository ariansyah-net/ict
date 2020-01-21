<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Downloads extends CI_Controller {

  public function index(){
    // $data['ar'] 			     = $this->it->orderBy('id_download', 'desc')->getAll();
    // $data['jml']        	= $this->download->getAll();
    // $data['jumlah'] 			= count($data['jml']);
    // $data['pagination'] 	= $this->download->makePagination(site_url('download'), 2, $data['jumlah']);
    $data['title']        = 'Downloads';
    $data['main_view']  = '_home/home_download';
    $data['ar']           = $this->it->load_downloads();
    $this->load->view('_temp/home_single', $data);
  }
  public function files(){
    $filename = $this->uri->segment(3);
    $this->it->update_hits_download($filename);
    $data = file_get_contents("arians/media/files/".$filename);
    force_download($filename, $data);
  }

}
