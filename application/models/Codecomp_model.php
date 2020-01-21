<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Codecomp_model extends MY_Model
{

	protected $perPage = 10;

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => ' ',
				'label' => ' ',
				'rules' => 'trim|required'
			],
			
		];

		return $validationRules;
	}

	public function getDefaultValues()
	{

		return [
			''		=>	'',
			'time_update'	=>	date('Y-m-d H:i:s')
		];
	}


}
