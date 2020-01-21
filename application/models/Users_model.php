<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Users_model extends MY_Model
{

	protected $perPage = 10;

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'nama_user',
				'label' => 'Name',
				'rules' => 'trim|required|min_length[4]|max_length[100]|callback_name_unique'
			],
			[
				'field' => 'code_user',
				'label' => 'User Code',
				'rules' => 'trim|required|max_length[4]|callback_code_unik'
			],
			[
				'field' => 'id_room',
				'label' => 'ID Room',
				'rules' => 'trim|required'
			],
			[
				'field' => 'no_hp',
				'label' => 'Phone',
				'rules' => 'trim|required|max_length[16]'
			],
			[
				'field' => 'jabatan',
				'label' => 'Position',
				'rules' => 'trim|required'
			],
			[
				'field' => 'lokasi',
				'label' => 'Location',
				'rules' => 'trim|required'
			],
			[
				'field' => 'fieldwork_name',
				'label' => 'Fieldwork',
				'rules' => 'trim|required'
			],

			[
				'field'	=> 'is_active',
				'label'	=> 'Status',
				'rules'	=> 'trim|required'
			],

		];
		return $validationRules;
	}

	public function getDefaultValues()
	{

		return [
			'nama_user'				=>	'',	//field in database must be same
			'code_user'				=>	'',
			'id_room'					=>  '',
			'no_hp' 					=>	'',
			'jabatan'					=>	'',
			'lokasi'					=>	'',
			'fieldwork_name'	=>	'',
			'avatar'					=>	'',
			'is_active'				=>	'',
			'search_room' 		=> '', //fake input, just for auto complete..
			'room_name'				=> '', //fake input, just for inser/edit auto complete..
			'time_update'			=>	date('Y-m-d H:i:s')
		];
	}

	public function uploadCover($fieldname, $filename)
    {
        $config = [
            'upload_path'      => './photos/',
            'file_name'        => $filename,
			'allowed_types' 	 => 'gif|jpg|png',
			'max_size'         => 2018, //2MB
						// Allowed Dimension
            // 'max_width'        => 1028,
						// 'max_height'       => 1028,
						'overwrite'        => true,
            'file_ext_tolower' => true,
        ];

        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldname)) {
            // Upload OK, return uploaded file info.
            return $this->upload->data();
        } else {
            // Add error to $_error_array
            $this->form_validation->add_to_error_array($fieldname, $this->upload->display_errors('', ''));
            return false;
        }
    }


	public function avatarResize($fieldname, $source_path, $width, $height)
    {
        $config = [
            'image_library'  => 'gd2',
            'source_image'   => $source_path,
            'maintain_ratio' => true,
            'width'          => $width,
            'height'         => $height,
						//add watermaking
						// 		'wm_text' 			 => 'Copyright 2017 - Ariansyah',
						// 		'wm_type' 			 => 'text',
						// 		'wm_font_path'  => './system/fonts/texb.ttf',
						// 		'wm_font_size' 	 => '8',
						// 		'wm_font_color'  => '000000',
						// 		'wm_vrt_alignment' => 'center',
						// 		'wm_hor_alignment' => 'left',
						// 		'wm_padding' 		 => '0',
         ];

			$this->image_lib->initialize($config);
			// $this->image_lib->watermark(); //add watermaking library
			//$this->load->library('image_lib', $config);

        if ($this->image_lib->resize()) {
            return true;
        } else {
            $this->form_validation->add_to_error_array($fieldname, $this->image_lib->display_errors('<p>', '</p>'));
            return false;
        }
    }

    public function deleteAvatar($imgFile)
    {
        if (file_exists("./photos/$imgFile")) {
            unlink("./photos/$imgFile");
        }
    }
// Room Auto Complete
		public function liveSearchRoom($keywords)
	    {
	    	return $this->db->select('id_room, room_name')
				    						->like('id_room', $keywords)
				    						->or_like('room_name', $keywords)
				    						->limit(10)
				    						->get('room')
				    						->result();
	    }
}
