<?php

define('TAB_SUGGESTION', 'activity_type_table');

class ActivityTypeModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all_activity_type()
	{
		$data = array();
		$query = $this->db->get(TAB_SUGGESTION);
		if (!is_null($query) && count($query->result()) > 0)
		{
			foreach ($query->result() as $key => $type) {
				$data[$key]['id'] = $type->id;
				$data[$key]['icon'] = $type->icon;
				$data[$key]['type_name'] = $type->type_name;
			}
		}

		return $data;
	}

}