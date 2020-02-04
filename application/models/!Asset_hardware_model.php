<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Asset_hardware_model extends MY_Model
{
	protected $perPage = 10;

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'hw_name',
				'label' => 'Hardware Name',
				'rules' => 'trim|required'
			],
			[
				'field' => 'hw_type',
				'label' => 'Type of Product',
				'rules' => 'trim|required'
			],
			[
				'field' => 'id_assetcategory',
				'label' => 'Category',
				'rules' => 'trim|required'
			],
			[
				'field' => 'id_room',
				'label' => 'Room',
				'rules' => 'trim|required'
			],
			[
				'field' => 'id_users',
				'label' => 'Users',
				'rules' => 'trim|required'
			],
			[
				'field' => 'hw_codefication',
				'label' => 'Codefication',
				'rules' => 'trim|required|callback_codefication_unique'
			],
		];

		return $validationRules;
	}

	public function getDefaultValues()
	{

		return [
			//'id_hardware' 			=> '',
			'id_assetcategory' 		=> '',
			'id_room' 						=> '',
			'id_users'						=> '',
			'hw_name'							=> '',
			'hw_type' 						=> '',
			'hw_product'					=> '',
			'hw_manufacturer_sn'	=> '',
			'hw_original_sn' 			=> '',
			'hw_price'						=> '',
			'hw_codefication'			=> '',
			'hw_procurement_year'	=> '',
			'hw_status'						=> '',
			'time_update'	=>	date('Y-m-d H:i:s')
		];
	}

	public function joincoy($table, $type = 'INNER')
    {
      $this->db->join($table, "$this->table.id_assetcategory = $table.id_assetcategory", $type);
      return $this;
    }

		public function printAll()
			{
				$sql = "SELECT *
								FROM asset_hardware
								INNER JOIN asset_category
								ON (asset_hardware.id_assetcategory = asset_category.id_assetcategory)
								ORDER BY asset_hardware.id_assetcategory DESC
								";
				return $this->db->query($sql)->result();
			}

		public function print_codefications_model()
			{
				$sql = "SELECT *
								FROM asset_hardware
								INNER JOIN users
								ON (asset_hardware.id_users = users.id_users)
								";
				return $this->db->query($sql)->result();
		}
}
