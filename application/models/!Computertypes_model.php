<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Computertypes_model extends MY_Model
{

	protected $perPage = 10;

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'nama_type',
				'label' => 'Type',
				'rules' => 'trim|required|max_length[50]|callback_type_unique'
			],
			
		];

		return $validationRules;
	}

	public function getDefaultValues()
	{

		return [
			'nama_type'		=>	'',
			'time_update'	=>	date('Y-m-d H:i:s')
		];
	}


}