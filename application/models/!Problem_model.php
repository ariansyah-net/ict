<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Problem_model extends MY_Model
{

	protected $perPage = 20;

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'date',
				'label' => 'date',
				'rules' => 'trim|required|max_length[30]'
			],
			[
				'field' => 'title_problem',
				'label' => 'problem',
				'rules' => 'trim|required|max_length[225]'
			],
			[
				'field' => 'followup',
				'label' => 'follow Up',
				'rules' => 'trim|required|max_length[225]'
			],
			[
				'field' => 'result',
				'label' => 'result',
				'rules' => 'trim|required'
			],
			[
				'field' => 'author',
				'label' => 'author',
				'rules' => 'trim|required|max_length[100]'
			],
		];
		return $validationRules;
	}

	public function getDefaultValues()
	{
		return [
			'date'						=> '',
			'id_users'				=> '',
			'other_user'			=> '',
			'period'					=> '',
			'title_problem'		=> '',
			'followup'				=> '',
			'result'					=> '',
			'result_date'			=> '',
			'information'			=> '',
			'author'					=> '',
			'search_user' 		=> '', //fake input, just for search in autocomplete form..
			'nama_user' 			=> '', //fake input, just for insert/edit in autocomplete form..
			'userlist' 				=> '', //fake input,
			'other' 					=> '', //fake input,
			'time_update'			=>	date('Y-m-d H:i:s')
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

public function printAll()
	{
		$sql = "SELECT *
		 				FROM problem
						INNER JOIN users
						ON (problem.id_users = users.id_users)
						ORDER BY problem.id_problem DESC
						";

		return $this->db->query($sql)->result();
	}


}
