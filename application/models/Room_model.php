<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Room_model extends MY_Model
{

	protected $perPage = 10;

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'room_name',
				'label' => 'Room',
				'rules' => 'trim|required|max_length[50]|callback_no_unique'
			],

		];

		return $validationRules;
	}

	public function getDefaultValues()
	{

		return [
			'room_name'				=>	'',
			'time_update'			=>	date('Y-m-d H:i:s')
		];
	}


}
