<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class Laporan extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model', 'laporan', true);
    		$this->halaman = 'report-users';
        $this->isLogin();
    }

	protected function isLogin()
    {
        $isLogin = $this->session->userdata('is_login');
        if(!$isLogin){
            redirect(base_url());
        }
    }

//******************** REPORT FOR USERS ********************

	public function report_users()
	{
		$pengguna		= $this->laporan->laporanusers();
		$jumlah_total	= count($pengguna);
		$halaman		= 'report-users';
		$main_view		= 'report/users';
		$this->load->view('template', compact('halaman', 'main_view', 'pengguna', 'jumlah_total'));
	}

	public function print_report_users()
	{
		$pengguna		= $this->laporan->laporanUsers();
		$jumlah_total	= count($pengguna);

		//template, return as string..
		$html = $this->load->view('report/users_pdf', compact('pengguna', 'jumlah_total'), true);

		//print with html2pdf
		require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");

		try {
			$html2pdf = new HTML2PDF('L', 'A4', 'en', true, 'UTF-8', array('10', '25', '10', '5'));
			$html2pdf->WriteHTML($html);
			$html2pdf->output('report_user_'.date('Ymd').'.pdf');

		} catch (HTML2PDF_exception $e) {
			// echo($e);
			$this->session->set_flashdata('error', 'Maaf, Terjadi kendala teknis..');
			redirect('report_users'); //back to function
		}
	}

//******************** REPORT FOR COMPUTER ********************

	public function report_spec()
	{

		$spec			= $this->laporan->laporanspec();
		$total			= count($spec);
		$main_view		= 'report/computer';
		$this->load->view('template', compact('main_view', 'spec', 'total'));
	}


	public function print_report_spec()
	{
		$spec	= $this->laporan->laporanSpec();
		$total	= count($spec);

		$html = $this->load->view('report/computer_pdf', compact('spec', 'total'), true);

		require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
		try {
			$html2pdf = new HTML2PDF('L', 'Legal', 'en', true, 'UTF-8', array('10', '10', '10', '5'));
			$html2pdf->WriteHTML($html);
			$html2pdf->output('report_computer_'.date('Ymd').'.pdf');

		} catch (HTML2PDF_exception $e) {
			// echo($e);
			$this->session->set_flashdata('error', 'Maaf, Terjadi kendala teknis..');
			redirect('report_spec'); //back to function.
		}
	}


}
