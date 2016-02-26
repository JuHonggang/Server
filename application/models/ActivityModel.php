<?php

define('TAB_NAME', 'activity_info_table');

class ActivityModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$result = $this->load->database();
		$this->load->helper('url');
	}

	public function get_latest_activities()
	{
		$data = array();
		$query = $this->db->get(TAB_NAME);
		if (!is_null($query) && count($query->result()))
		{
			foreach ($query->result() as $key => $activity) {
				$data[$key]['id'] = $activity->id;
				$data[$key]['title'] = $activity->title;
				$data[$key]['user_name'] = $activity->user_name;
				$data[$key]['destination'] = $activity->destination;
				$data[$key]['distance'] = $activity->distance;
				$data[$key]['create_time'] = $activity->create_time;
				$data[$key]['type'] = $activity->type;
				$data[$key]['status'] = $activity->status;
				$data[$key]['number_of_person'] = $activity->number_of_person;
			}
		} 
		
		return $data;
	}

	public function get_specific_type_activities()
	{
		$data = array();
		$type = $this->input->get('type');
		$query = $this->db->get_where(TAB_NAME, array('type' => $type));
		if (!is_null($query) && count($query->result()))
		{
			foreach ($query->result() as $key => $activity) {
				$data[$key]['id'] = $activity->id;
				$data[$key]['title'] = $activity->title;
				$data[$key]['user_name'] = $activity->user_name;
				$data[$key]['destination'] = $activity->destination;
				$data[$key]['distance'] = $activity->distance;
				$data[$key]['create_time'] = $activity->create_time;
				$data[$key]['type'] = $activity->type;
				$data[$key]['status'] = $activity->status;
				$data[$key]['number_of_person'] = $activity->number_of_person;
			}
		}
		
		return $data;
	}

	public function get_specific_activity()
	{
		$data = array();
		$id = $this->input->get('id');
		if (!empty($id))
		{
			$query = $this->db->get_where(TAB_NAME, array('id' => $id));
			if (!is_null($query) && $result = $query->row())
			{
				$data['id'] = $result->id;
				$data['title'] = $result->title;
				$data['user_name'] = $result->user_name;
				$data['destination'] = $result->destination;
				$data['distance'] = $result->distance;
				$data['create_time'] = $result->create_time;
				$data['type'] = $result->type;
				$data['status'] = $result->status;
				$data['number_of_person'] = $result->number_of_person;
			} 
		}

		return $data;
	}

	public function add_activity()
	{
		phpinfo();
		$data =  array(
			'title' 			=> $this->input->post('title'),
			'user_id' 			=> $this->input->post('user_id'),
			'user_name' 		=> $this->input->post('user_name'),
			'destination' 		=> $this->input->post('destination'),
			'distance' 			=> $this->input->post('distance'),
			'create_time' 		=> strtotime($this->input->post('create_time')),
			'type' 				=> $this->input->post('type'),
			'status' 			=> $this->input->post('status'),
			'number_of_person' 	=> $this->input->post('number_of_person'),
			);
		print_r($data);
		return $this->db->insert(TAB_NAME, $data);
	}

	public function del_activity($id)
	{	
		$id = $this->input->get('id');
		return $this->db->delete(TAB_NAME, array('id' => $id));
	}

	public function update_activity()
	{
		$data =  array(
			'title' 			=> $this->input->post('title'),
			'user_id' 			=> $this->input->post('user_id'),
			'user_name' 		=> $this->input->post('user_name'),
			'destination' 		=> $this->input->post('destination'),
			'distance' 			=> $this->input->post('distance'),
			'create_time' 		=> strtotime($this->input->post('create_time')),
			'type' 				=> $this->input->post('type'),
			'status' 			=> $this->input->post('status'),
			'number_of_person' 	=> $this->input->post('number_of_person'),
			);

		return $this->db->replace(TAB_NAME, $data);
	}
} 
