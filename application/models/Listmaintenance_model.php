<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Listmaintenance_model extends MY_Model
{
	protected $perPage =20;

	public function getValidationRules()
	{
		$validationRules = [

			[
				'field' => 'l_month',
				'label' => 'Month',
				'rules' => 'trim|required'
			],
			[
				'field' => 'l_year',
				'label' => 'Year',
				'rules' => 'trim|required'
			],
		];

		return $validationRules;
	}

	public function getDefaultValues()
	{

		return [
			'id_users'				=> '',
			'id_room'					=> '',
			'l_pcname'				=> '',
			'l_month'					=> '',
			'l_year' 					=> '',
			'note'						=> '',

			'l_casing'				=> '',
			'l_monitor'				=> '',
			'l_keyboard'			=> '',
			'l_mouse'					=> '',
			'l_mainboard'			=> '',
			'l_processor'			=> '',
			'l_harddrive'			=> '',
			'l_ram'						=> '',
			'l_vga'						=> '',
			'l_cdroom'				=> '',
			'l_lancard'				=> '',
			'l_pan'						=> '',
			'l_powersupply'		=> '',
			'l_printer'				=> '',
			'l_scanner'				=> '',
			'l_software'			=> '',
			'l_os'						=> '',
			'status'					=> '',
			'author'					=> '',
			'nama_user'				=> '', //fake input, just for insert/edit in autocomplete form..
			'search_lmuac'		=> '', //fake input, just for show auto complete user..

			'last_update'			=>	date('Y-m-d H:i:s')
		];

	}
//Remove from selected
	public function selected($id) {
	  $this->db->where('l_id_list', $id);
	  $this->db->delete('listmaintenance');
	}

	// public function remove_checked() {
	// 		$action = $this->input->post('action');
	// 		if($action == "delete") {
	// 			$delete = $this->input->post('msg');
	// 			for ($i=0; $i < count($delete); $i++) {
	// 				$this->db->where('l_id_list', $delete[$i]);
	// 				$this->db->delete('listmaintenance');
	// 			}
	// 		}
	// }

		function joincoy($table, $type = 'INNER')
	    {
					// disable this menu, for relation to computers table, for get codefication computers.
	        // $this->db->join($table, "$this->table.id_users = $table.id_users", $type);
					$this->db->join('room', 'room.id_room = users.id_room', $type);
	        return $this;
	    }


		function joinRom($tabel){
			return $this->db->query("SELECT * FROM room
															inner join listmaintenance on room.id_room=listmaintenance.id_room
															");
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

		public function print_all_model()
			{
				$sql = "SELECT *
								FROM listmaintenance
								INNER JOIN users
								ON (listmaintenance.id_users = users.id_users)
								INNER JOIN computers
								ON (listmaintenance.id_users = computers.id_users) ";
				return $this->db->query($sql)->result();
		}

}
