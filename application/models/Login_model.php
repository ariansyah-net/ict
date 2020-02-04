
<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login_model extends MY_Model
{
    public $table = 'it_users';

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            ],
        ];

        return $validationRules;
    }

    public function getDefaultValues()
    {
        return [
            'username'      => '',
            'first_name'    => '',
            'role_id'       => '',
            'password'      => ''
        ];
    }

    public function login($input)
    {
        $input->password = md5($input->password);

        $user = $this->db->where('username', $input->username)
                          ->where('password', $input->password)
                          ->where('role_id', '2')
                          ->limit(1)
                          ->get($this->table)
                          ->row();

        if (count($user)) {
            $data = [
                'id_users'   => $user->id_users,
                'username'   => $user->username,
                'role_id'    => $user->role_id,
                'first_name' => $user->first_name,
                'password'   => $user->password,
                'avatar'     => $user->avatar,
                'is_login'   => true
            ];

            $this->session->set_userdata($data);
            return true;
        }
        return false;
    }

    public function logout()
    {
        $data = [
            'id_users'      => null,
            'username'      => null,
            'role_id'       => null,
            'first_name'    => null,
            'password'      => null,
            'is_login'      => null
        ];
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
    }
}
