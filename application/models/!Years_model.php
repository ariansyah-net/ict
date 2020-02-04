<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Years_model extends MY_Model
{

	protected $perPage = 10;

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'year_name',
				'label' => 'Year',
				'rules' => 'trim|required|max_length[4]|callback_year_unique'
			],

		];

		return $validationRules;
	}

	public function getDefaultValues()
	{

		return [
			'year_name'		=>	'',
			'time_update'	=>	date('Y-m-d H:i:s')
		];
	}


}
