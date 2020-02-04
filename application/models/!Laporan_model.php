<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Laporan_model extends MY_Model
{

/*********** HERE REPORT MODEL USERS ************* */

	public function laporanusers()
	{
		$sql = "SELECT users.id_users,
						users.nama_user,
						users.code_user,
						users.no_hp,
						users.jabatan,
						users.lokasi,
						users.no_ruangan,
						users.bagian,
						users.avatar,
						users.is_active
				FROM users";
		return $this->db->query($sql)->result();
	}

/*********** HERE REPORT MODEL SPEC COMPUTER ************* */
	public function laporanspec()
		{
			$sql = "SELECT *
							FROM computers
							INNER JOIN users
							ON (computers.id_users = users.id_users)";
			return $this->db->query($sql)->result();
	}



}
