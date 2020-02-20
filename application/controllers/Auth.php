<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('is_login')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            // $title         = 'IT Operations | Login';
            // $main_view     = '_auth/login';
            $data['title'] = 'IT Operation | Login';
            $this->load->view('_temp/auth_header', $data);
            $this->load->view('_auth/login');
            $this->load->view('_temp/auth_footer');
            // $this->load->view('_temp/auth_template', compact('main_view','title'));
            return;
        } else {
            $this->_login();
        }
    }


    private function _login()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $user       = $this->db->get_where('it_users', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_users' 		=> $user['id_users'],
                        'email' 		=> $user['email'],
                        'role_id' 		=> $user['role_id'],
                        'first_name'	=> $user['first_name'],
                        'last_name'     => $user['last_name'],
                        'date_created'  => $user['date_created'],
                        'avatar'		=> $user['avatar'],
                        'phone'         => $user['phone'],
                        'is_login'  	=> true
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('dashboard');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('danger', 'Wrong password!');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('danger', 'This email has not been activated! Please active your account from your email.');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('danger', 'Sorry your account is not registered!');
            redirect('auth');
        }
    }


    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('member');
        }

        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|max_length[10]|min_length[3]|xss_clean');
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[it_users.email]', [
            'is_unique' => 'This email has already registered, please <a class="info-danger" href="/auth">Sign In > </a>'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title']        = 'OPIT Registration';
            // $data['participant']  = $this->db->get('participant');
            // $data['presenter']    = $this->db->get('presenter');

            $this->load->view('_temp/auth_header', $data);
            $this->load->view('_auth/registration');
            $this->load->view('_temp/auth_footer');

        } else {
            $email = $this->input->post('email', true);
            $data = [
                'first_name' 	=> htmlspecialchars($this->input->post('first_name', true)),
                'last_name' 	=> htmlspecialchars($this->input->post('last_name', true)),
                'phone'         => htmlspecialchars($this->input->post('phone', true)),
                'email' 		=> htmlspecialchars($email),
                'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'avatar' 		=> 'whois.png',
                'role_id' 		=> 2,
                'is_active' 	=> 0,
                'date_created' 	=> time()
            ];

            // siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email'         => $email,
                'token'         => $token,
                'date_created'  => time()
            ];

            $this->db->insert('it_users', $data);
            $this->db->insert('it_users_token', $user_token);
            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('info', '<strong>Congratulations!</strong> Your account has been successfully created, please login.');
            redirect('auth');
        }
    }


    public function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'ict.ffup@univpancasila.ac.id',
            'smtp_pass' => 'pancasila',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        // $this->load->library('email', $config);
        // $this->email->set_newline("\r\n");

        $this->email->initialize($config);
        $this->email->from('ict.ffup@univpancasila.ac.id', 'IT FFUP');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Thankyou for registered,  click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">ACTIVATE</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function verify()
    {
        $email  = $this->input->get('email');
        $token  = $this->input->get('token');
        $user   = $this->db->get_where('it_users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('it_users_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('it_users');

                    $this->db->delete('it_users_token', ['email' => $email]);

                    $this->session->set_flashdata('info', 'Okey ' . $email . ' has been activated! Please login.');
                    redirect('auth');
                } else {
                    $this->db->delete('it_users', ['email' => $email]);
                    $this->db->delete('it_users_token', ['email' => $email]);

                    $this->session->set_flashdata('danger', 'Account activation failed! Token expired.');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('danger', 'Account activation failed! Wrong token.');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('danger', 'Account activation failed! Wrong email.');
            redirect('auth');
        }
    }


    public function logout()
    {
        $data = [
            'id_users'      => null,
            'role_id'       => null,
            'first_name'    => null,
            'last_name'     => null,
            'date_created'  => null,
            'password'      => null,
            'avatar'        => null,
            'is_login'      => null
        ];
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();

        $this->session->set_flashdata('info', 'You have been logged out!');
        redirect(base_url());
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }


    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'IT Operation | Forgot Password';
            $this->load->view('_temp/auth_header', $data);
            $this->load->view('_auth/forgot');
            $this->load->view('_temp/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('it_users', ['email' => $email, 'is_active' => 'Y'])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('it_users_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('info', '<i class="fas fa-check"></i> Please check your email to reset your password!');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('danger', '<i class="fas fa-exclamation-triangle"></i> Sorry email is not registered or activated!');
                redirect('auth/forgotpassword');
            }
        }
    }


    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }


    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }
}
