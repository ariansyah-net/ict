<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Schedule_model', 'schedule', true);
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

        if(!$_POST) {
            $input = (object) $this->schedule->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->schedule->validate())
        {
            $schedule    = $this->schedule->paginate($page)->orderBy('id_schedule', 'desc')->getAll();
            $jml         = $this->schedule->getAll();

            $jumlah      = count($jml);
            $main_view   = 'v-schedule/index';
            $form_action = 'schedule';
            $pagination  = $this->schedule->makePagination(site_url('schedule'), 2, $jumlah);

            $this->load->view('template', compact('main_view', 'schedule', 'pagination', 'jumlah', 'form_action', 'input'));
            return;
        }

        if ($this->schedule->insert($input))
        {
            $this->session->set_flashdata('info', 'New Schedule successfully added..');
        } else {
            $this->session->set_flashdata('danger', 'Uppss.. there is wrong when insert this data, please check your database!');
        }
            redirect('schedule');
    }

    public function create()
    {
        if (!$_POST) {
            $input = (object) $this->schedule->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->schedule->validate())
        {
            $halaman        = $this->halaman;
            $main_view      = 'v-schedule/form';
            $form_action    = 'schedule/create';
            $this->load->view('template', compact('halaman', 'main_view', 'form_action', 'input'));
            return;
        }

        if ($this->schedule->insert($input))
        {
            $this->session->set_flashdata('success', 'Oke sip, data baru berhasil ditambahkan..');
        } else {
            $this->session->set_flashdata('danger', 'Uppss.. there is wrong when insert this data, please check your database.');
        }
            redirect('schedule');
    }

    public function edit($id, $page = null)
    {
        $schedule = $this->schedule->where('sha1(id_schedule)', $id)->get();
        if(!$schedule) {
            $this->session->set_flashdata('warning', 'Sorry, there is no data for displayed.');
            redirect('schedule');
        }
            if(!$_POST) {
                $input = (object) $schedule;
            } else {
                $input = (object) $this->input->post(null, true);
            }

        if (!$this->schedule->validate() || $this->form_validation->error_array()) {

            $schedule       = $this->schedule->paginate($page)->getAll();
            $jml            = $this->schedule->getAll();

            $jumlah         = count($jml);
            $main_view      = 'v-schedule/form';
            $form_action    = "schedule/edit/$id";
            $pagination     = $this->schedule->makePagination(site_url('schedule'), 2, $jumlah);

            $this->load->view('template', compact('main_view', 'schedule', 'pagination', 'jumlah', 'form_action', 'input'));
            return;
        }

        if ($this->schedule->where('sha1(id_schedule)', $id)->update($input)){
            $this->session->set_flashdata('info', 'Update data successfully..');
        } else {
            $this->session->set_flashdata('danger', 'Uppss.. there is wrong when update this data, please check your database.');
        }
        redirect('schedule');
    }

    public function delete($id = null)
    {
        $schedule = $this->schedule->where('sha1(id_schedule)', $id)->get();
        if (!$schedule) {
            $this->session->set_flashdata('warning', 'Sorry, there is no data for displayed.');
            redirect('schedule');
        }

        if ($this->schedule->where('sha1(id_schedule)', $id)->delete()) {
            $this->session->set_flashdata('success', 'Remove data successfully..');
        } else {
            $this->session->set_flashdata('danger', 'Uppss.. there is wrong when remove this data, please check your database.');
        }
        redirect('schedule');
    }


    public function searchkeywords($page = null)
    {

        if(!$_POST) {
            $input = (object) $this->schedule->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->schedule->validate())
        {

            $keywords   = $this->input->get('keywords', true);
            $schedule   = $this->schedule->where('room_name', $keywords)
                                      ->orLike('room_name', $keywords)
                                      ->paginate($page)
                                      ->getAll();
            $jml        = $this->schedule->where('id_schedule', $keywords)
                                      ->orLike('room_name', $keywords)
                                      ->getAll();
            $jumlah     = count($jml);
            $pagination = $this->schedule->makePagination(site_url('schedule/searchkeywords/'), 3, $jumlah);

                if (!$schedule) {
                    $this->session->set_flashdata('warning', 'Uppss.. sorry data not found !');
                    redirect('schedule');
                }
            $halaman    = $this->halaman;
            $main_view  = 'v-schedule/index';
            $form_action = 'schedule';
            $this->load->view('template', compact('halaman', 'main_view', 'schedule', 'pagination', 'jumlah', 'form_action', 'input'));
            return;
        }

        if ($this->schedule->insert($input))
        {
            $this->session->set_flashdata('success', 'New Schedule successfully added..');
        } else {
            $this->session->set_flashdata('danger', 'Uppss.. there is wrong when insert this data, please check your database!');
        }
            redirect('schedule');
    }

//get by month

    public function getmonth($page = null)
    {
        if(!$_POST) {
            $input = (object) $this->schedule->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->schedule->validate())
        {
            $month = $this->input->get('keywords');
            $schedule  = $this->schedule->where('month_name', $month)
                                        ->orLike('id_schedule', 'id_schedule')
                                        ->orderBy('schedule.id_schedule')
                                        ->paginate($page)
                                        ->getAll();

            $jml        = $this->schedule->where('id_schedule', $month)
                                         ->orLike('month_name', $month)
                                         ->getAll();
            $jumlah     = count($jml);
            $pagination = $this->schedule->makePagination(site_url('schedule/getmonth/'), 3, $jumlah);

                if (!$schedule) {
                    $this->session->set_flashdata('warning', 'Sorry.. data not found!');
                    redirect('schedule');
                }
            $halaman    = $this->halaman;
            $main_view  = 'v-schedule/index';
            $form_action = 'schedule';
            $this->load->view('template', compact('halaman', 'main_view', 'schedule', 'pagination', 'jumlah', 'form_action', 'input'));
            return;
        }

        if ($this->schedule->insert($input))
        {
            $this->session->set_flashdata('success', 'New Schedule successfully added..');
        } else {
            $this->session->set_flashdata('danger', 'Uppss.. there is wrong when insert this data, please check your database!');
        }
            redirect('schedule');
      }


//get by Rooms and location
  public function getroom($page = null)
  {
      if(!$_POST) {
          $input = (object) $this->schedule->getDefaultValues();
      } else {
          $input = (object) $this->input->post(null, true);
      }

      if (!$this->schedule->validate())
      {
          $room      = $this->input->get('keywords');
          $schedule  = $this->schedule->where('room_name', $room)
                                      ->orLike('id_schedule', 'id_schedule')
                                      ->orderBy('schedule.id_schedule')
                                      ->paginate($page)
                                      ->getAll();
          $jml        = $this->schedule->where('id_schedule', $room)
                                       ->orLike('room_name', $room)
                                       ->getAll();
          $jumlah     = count($jml);
          $pagination = $this->schedule->makePagination(site_url('schedule/getroom/'), 3, $jumlah);

              if (!$schedule) {
                  $this->session->set_flashdata('warning', 'Sorry.. data not found!');
                  redirect('schedule');
              }
          $halaman      = $this->halaman;
          $main_view    = 'v-schedule/index';
          $form_action  = 'schedule';
          $this->load->view('template', compact('halaman', 'main_view', 'schedule', 'pagination', 'jumlah', 'form_action', 'input'));
          return;
        }
      if ($this->schedule->insert($input))
        {
          $this->session->set_flashdata('success', 'New Schedule successfully added..');
        } else {
          $this->session->set_flashdata('danger', 'Uppss.. there is wrong when insert this data, please check your database!');
        }
          redirect('schedule');
      }

//PRINT
      public function printall()
      	{
      			$sched = $this->schedule->m_printAll();
      			$total = count($sched);

      			$html  = $this->load->view('v-schedule/printAllSchedule', compact('sched', 'total'), true);
      			require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");

      			try {
      				$html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('10', '5', '10', '0')); //left-top-right-bottom
      				$html2pdf->WriteHTML($html);
      				$html2pdf->pdf->SetTitle('Schedule Maintenance');
      				$html2pdf->output('Schedule-Maintenance-'.date('Ymd').'.pdf');

      			} catch (HTML2PDF_exception $e) {
      				echo($e);
      				$this->session->set_flashdata('error', 'Sorry.. That Something wrong, please check before or contact your developer!');
      				redirect('schedule');
      			}
      	}



  }
