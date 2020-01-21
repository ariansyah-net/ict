<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jobprogram_model extends MY_Model
{

	protected $perPage = 10;

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'quality_objectives',
				'label' => 'Type',
				'rules' => 'trim|required'
			],
			[
				'field' => 'target',
				'label' => 'Target',
				'rules' => 'trim|required'
			],
			[
				'field' => 'jobname1',
				'label' => 'Program Kerja',
				'rules' => 'trim|required'
			],
			[
				'field' => 'implementation1',
				'label' => 'Tanggal Pelaksanaan',
				'rules' => 'trim|required'
			],
			[
				'field' => 'status',
				'label' => 'status',
				'rules' => 'trim|required'
			],
			[
				'field' => 'period',
				'label' => 'Tahun Periode',
				'rules' => 'trim|required'
			],

		];

		return $validationRules;
	}

	public function getDefaultValues()
	{

		return [
			'quality_objectives'		=>	'',
			'target'					=> '',
			'jobname1'					=> '',
			'implementation1'			=> '',
			'jobname2'					=> '',
			'implementation2'			=> '',
			'jobname3'					=> '',
			'implementation3'			=> '',
			'planning_price'			=> '',
			'period' 					=> '',
			'mount'						=> '',
			'status'					=> '',
			'time_update'				=>	date('Y-m-d H:i:s')
		];
	}


}
