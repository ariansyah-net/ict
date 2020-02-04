<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Asset_software_model extends MY_Model
{
	protected $perPage = 10;

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'sf_name',
				'label' => 'Software Name',
				'rules' => 'trim|required'
			],
		];

		return $validationRules;
	}

	public function getDefaultValues()
	{

		return [
			//'id' 			         => '',
			'id_assetcategory' 		=> '',
			'id_lisence' 		   		=> '',
			'sf_name' 						=> '',
			'sf_vendor'						=> '',
			'sf_lisence_key'	    => '',
			'sf_acquisition_date'	=> '',
			'sf_expiry_date'	    => '',
			'sf_serial_number'		=> '',
      'sf_price'            => '',
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
				 				FROM asset_software
								INNER JOIN asset_category
								ON (asset_software.id_assetcategory = asset_category.id_assetcategory)
								ORDER BY asset_software.id DESC
								";
				return $this->db->query($sql)->result();
			}

}
