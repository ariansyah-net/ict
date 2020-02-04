<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Locations_model extends MY_Model
{

	protected $perPage = 10;

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'nama_lokasi',
				'label' => 'Location',
				'rules' => 'trim|required|max_length[10]|callback_locations_unique'
			],

		];

		return $validationRules;
	}

	public function getDefaultValues()
	{

		return [
			'nama_lokasi'	=>	'',
			'time_update'	=>	date('Y-m-d H:i:s')
		];
	}


}
