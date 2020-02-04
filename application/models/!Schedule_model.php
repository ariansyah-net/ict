<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Schedule_model extends MY_Model
{
	protected $perPage = 20;

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'room_name',
				'label' => 'Room',
				'rules' => 'trim|required'
			],
			[
				'field' => 'month_name',
				'label' => 'Month',
				'rules' => 'trim|required'
			],
		];

		return $validationRules;
	}

	public function getDefaultValues()
	{

		return [
			'room_name'				=> '',
			'month_name'			=> '',
			'time_update'		=>	date('Y-m-d H:i:s')
		];
	}


	public function m_printAll()
		{
			$sql = "SELECT month_name, room_name FROM schedule ORDER BY id_schedule";
			return $this->db->query($sql)->result();
		}

}
