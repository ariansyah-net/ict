<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fieldwork_model extends MY_Model
{

	protected $perPage = 10;

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'fieldwork_name',
				'label' => 'Fieldwork',
				'rules' => 'trim|required|max_length[100]|callback_field_unique'
			],
		];
		return $validationRules;
	}

	public function getDefaultValues()
	{

		return [
			'fieldwork_name'	=>	'',
			'time_update'			=>	date('Y-m-d H:i:s')
		];
	}


}
