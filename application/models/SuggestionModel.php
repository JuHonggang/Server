<?php

define('TABLE_SUGGESTION', 'suggestion_table');

class SuggestionModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function submit_suggestion()
	{
		$data = array(
			'tel_number' => $this->input->post('teo_number'),
			'content' => $this->input->post('content'),
			'time'    => '2016-02-29 17:52:30'
		);

		return $this->db->insert(TABLE_SUGGESTION, $data);
	}

}