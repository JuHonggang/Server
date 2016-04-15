<?php

define('VERSION_TABLE', 'version_table');

class VersionModel extends CI_Model 
{
	public function __constructor()
	{
		parent::__constructor();
		$this->load->database();
		$this->load->help('url');
	}

	public function update_version()
	{
		$data = array();
		$sql = 'select * from '.VERSION_TABLE.' where version_code = (select max(version_code) from '.VERSION_TABLE.');';
		$query = $this->db->query($sql);
		if (!is_null($query) && $result=$query->row())
		{
			$data['must_update'] = $result->must_update;
			$data['version'] = $result->version;
			$data['version_code'] = $result->version_code;
			$data['version_desc'] = $result->version_desc;
			$data['download_url'] = $result->download_url;
		} 

		return $data;
	}
}