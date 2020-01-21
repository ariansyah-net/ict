<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Computers_model extends MY_Model
{
	protected $perPage = 20;

	public function getValidationRules()
	{
			$validationRules = [

			// [
			// 	'field' => 'code_user',
			// 	'label' => 'Code',
			// 	'rules' => 'trim|required|max_length[4]|min_length[4]|callback_codeuser_unique'
			// ],
			[
				'field' => 'cpu_casing',
				'label' => 'CPU Casing',
				'rules' => 'max_length[100]'
			],
			[
				'field' => 'monitor',
				'label' => 'Monitor',
				'rules' => 'max_length[100]'
			],
			[
				'field' => 'keyboard',
				'label' => 'Keyboard',
				'rules' => 'max_length[100]'
			],
			[
				'field' => 'mouse',
				'label' => 'Mouse',
				'rules' => 'max_length[100]'
			],
			[
				'field' => 'mainboard',
				'label' => 'Mainboard',
				'rules' => 'max_length[100]'
			],
			[
				'field' => 'processor',
				'label' => 'Processor',
				'rules' => 'max_length[100]'
			],
			[
				'field' => 'harddrive',
				'label' => 'HardDrive',
				'rules' => 'max_length[100]'
			],
			[
				'field' => 'ram',
				'label' => 'RAM',
				'rules' => 'max_length[100]'
			],
			[
				'field' => 'vga',
				'label' => 'VGA',
				'rules' => 'max_length[100]'
			],
			[
				'field' => 'cdroom',
				'label' => 'CD Room',
				'rules' => 'max_length[100]'
			],
			[
				'field' => 'lancard',
				'label' => 'Lancard',
				'rules' => 'max_length[100]'
			],
			[
				'field' => 'pan',
				'label' => 'Pan',
				'rules' => 'max_length[50]'
			],
			[
				'field' => 'powersupply',
				'label' => 'Power Supply',
				'rules' => 'max_length[50]'
			],
			[
				'field' => 'printer',
				'label' => 'Printer',
				'rules' => 'max_length[50]'
			],
			[
				'field' => 'scanner',
				'label' => 'Scanner',
				'rules' => 'max_length[50]'
			],

			[
				'field'	=> 'ipaddress',
				'label'	=> 'IP Address',
				'rules'	=> 'trim|required|max_length[15]|callback_ip_unique'
			],
			[
				'field' => 'netmask',
				'label' => 'Netmask',
				'rules' => 'max_length[15]'
			],
			[
				'field' => 'dnsserver',
				'label' => 'DNS Server',
				'rules' => 'max_length[15]'
			],
			[
				'field'	=> 'macaddress',
				'label'	=> 'Mac Address',
				'rules'	=> 'trim|required|max_length[30]|callback_mac_unique'
			],
			[
				'field' => 'platform',
				'label' => 'Plaftform',
				'rules' => 'trim|max_length[50]'
			],
			[
				'field' => 'os',
				'label' => 'Operating System',
				'rules' => 'max_length[100]'
			],
			[
				'field' => 'antivirus',
				'label' => 'Anti Virus',
				'rules' => 'max_length[50]'
			],
			[
				'field' => 'acquisition',
				'label' => 'Acquisition',
				'rules' => 'max_length[4]|min_length[4]'
			],
			[
				'field'	=> 'codefication',
				'label'	=> 'Kodefikasi',
				'rules'	=> 'trim|required|max_length[20]|callback_code_unique'
			],

		];

		return $validationRules;
	}


	public function getDefaultValues()
	{
		return [
			'id_users'					=> '',
			'code_user'		 			=> '',

			'cpu_casing'				=> '',
			'monitor'						=> '',
			'keyboard'					=> '',
			'mouse'							=> '',
			'mainboard'					=> '',
			'processor'					=> '',
			'harddrive'					=> '',
			'ram'								=> '',
			'vga'								=> '',
			'cdroom'						=> '',
			'lancard'						=> '',
			'computer_type'			=> '',
			'pan'								=> '',
			'powersupply'				=> '',
			'printer'						=> '',
			'scanner'						=> '',
			/* Network */
			'ipaddress'					=> '',
			'netmask'						=> '',
			'gateway'						=> '',
			'dnsserver'					=> '',
			'macaddress'				=> '',
			'ip_type'						=> '',
			/* Software */
			'platform'					=> '',
			'os'								=> '',
			'software'					=> '',
			'antivirus'					=> '',
			'explanation'				=> '',
			/* Code */
			'acquisition'				=> '',
			'codefication'			=> '',
			'search_compac' 		=> '', //fake input, just for auto complete..
			'nama_user'					=> '', //fake input, just for inser/edit auto complete..
			'time_update'				=> date('Y-m-d H:i:s')

		];
	}

	public function liveSearchUser($keywords)
    {
    	return $this->db->select('id_users, nama_user, code_user')
    						->like('id_users', $keywords)
    						->or_like('nama_user', $keywords)
    						->limit(10)
    						->get('users')
    						->result();
    }

	public function print_codefications_model()
		{
			$sql = "SELECT *
							FROM computers
							INNER JOIN users
							ON (computers.id_users = users.id_users)
							";
			return $this->db->query($sql)->result();
	}


}
