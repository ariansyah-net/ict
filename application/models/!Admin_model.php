<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Admin_model extends MY_Model
{
	protected $perPage = 10;

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'nama_admin',
				'label' => 'Admin Name',
				'rules' => 'trim|required'
			],
			[
				'field' => 'username',
				'label' => 'Admin username',
				'rules' => 'trim|required'
			],
			[
				'field' => 'password',
				'label' => 'Admin Password',
				'rules' => 'trim|required'
			],
			
		];

		return $validationRules;
	}

	public function getDefaultValues()
	{

		return [
			'nama_admin'	=> '',
			'username'		=> '',
			'password'		=> '',
			'level'			=> '',

			'fieldwork'		=> '',
			'since'			=> '',
			'phone'			=> '',


			'is_blokir'		=> '',
			'time_update'		=>	date('Y-m-d H:i:s')
		];
	}

}
