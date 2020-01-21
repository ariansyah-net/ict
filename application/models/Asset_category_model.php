<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Asset_category_model extends MY_Model
{
	protected $perPage = 10;

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'asset_cat_name',
				'label' => 'Category Name',
				'rules' => 'trim|required'
			],
			[
				'field' => 'asset_type_category',
				'label' => 'Pilih category dan',
				'rules' => 'trim|required'
			],
		];
		return $validationRules;
	}

	public function getDefaultValues()
	{

		return [
			//'id_assetcategory' 		=> '',
			'asset_type_category'		=> '',
			'asset_cat_name'				=> '',
			'last_update'						=>	date('Y-m-d H:i:s')
		];
	}

}
